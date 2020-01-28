<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\BandSearchForm;

class BandListCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    //private $currentLogin;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new BandSearchForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->musictype = ParamUtils::getFromRequest('sf_musictype');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function action_BandList() {
        //$currentLogin = SessionUtils::load("sessionLogin", true);
        $currentRole = SessionUtils::load("currentRole", true);
        //echo($currentLogin);
        $this->validate();
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->musictype) && strlen($this->form->musictype) > 0) {
            $search_params['musictype[~]'] ='%' . $this->form->musictype . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }
           $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "name";
        //wykonanie zapytania
        try {
            $this->records = App::getDB()->select("bands", [
                "idband",
                "name",
                "musictype",
                "ishired",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 4. wygeneruj widok
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('bands', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('currentRole', $currentRole);
        App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));
        // App::getSmarty()->assign('currentLogin', $this->currentLogin);
        App::getSmarty()->display('BandList.tpl');

    }

}
