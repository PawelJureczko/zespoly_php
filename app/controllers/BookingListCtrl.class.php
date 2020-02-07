<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\BookingListForm;

class BookingListCtrl {

    private $form; //dane formularza wyszukiwania
    private $recordsCalendary; //rekordy z tabeli kalendarz


    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new BookingListForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->bandname = ParamUtils::getFromRequest('sf_bandname');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function action_CalendaryDelete(){
        App::getDB()->delete("calendary", [
            "idcalendary" => ParamUtils::getFromCleanURL(1, true, 'Blad')
        ]);
        Utils::addInfoMessage('Pomyslnie usunieto rezerwacje');
        App::getRouter()->forwardTo('BookedBandList');
    }



    public function action_BookedBandList() {

        $this->validate();

        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->bandname) && strlen($this->form->bandname) > 0) {
            $search_params['bands.name[~]'] ='%' . $this->form->bandname . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }
           $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "bands.name";
        //wykonanie zapytania */
        try {
            $this->recordsCalendary = App::getDB()->select("calendary", [
                "[>]bands"=>["idband"=>"idband"],
                "[>]clients"=>["idclient"=>"idclient"]
            ],
        [
                "calendary.idcalendary",
                "bands.name",
                "clients.login",
                "calendary.date",
                "calendary.city",
                "calendary.reservationDate"
        ], $where);

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


      // 4. wygeneruj widok
        //App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('calendary', $this->recordsCalendary);  // lista rekordów z bazy danych
        //App::getSmarty()->assign('currentRole', SessionUtils::load("currentRole", true));
        //App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));
        App::getSmarty()->display('BookingList.tpl');
    }

}
