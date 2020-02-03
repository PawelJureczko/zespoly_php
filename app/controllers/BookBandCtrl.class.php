<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\BookBandForm;

class BookBandCtrl {

    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    //private $currentLogin;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new BookBandForm();
    }


    public function action_BookBand() {
        try {
            $this->records = App::getDB()->select("bands", [
                "idband",
                "name",
                "musictype",
                "ishired",
            ], [
                "idband"=>ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji')

            ]
        );
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        SessionUtils::store('idband', ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji'));
        // 4. wygeneruj widok
        App::getSmarty()->assign('bands', $this->records);  // lista rekordów z bazy danych
        //App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));
        App::getSmarty()->display('BookBand.tpl');

    }

    public function action_ConfirmBookBand(){

        $date = $_POST['date'];
        $idclient = SessionUtils::load('sessionID', true);
        //print_r($idclient);
        date_default_timezone_set('Europe/Berlin');
        $currentDate = date('Y/m/d', time());
        //print_r($date);
        $idband = SessionUtils::load('idband', false);

        $test = App::getDB()->get("calendary", ["idcalendary"],
         [
            "date" => $date,
            "idband"=>$idband
        ]);

        if ($test!=0){
            Utils::addErrorMessage('Niestety, podany termin jest juz zarezerwowany');
            $this->generateView();
        } else {

        App::getDB()->insert("calendary", [
            "idband"=>$idband,
            "idclient"=>$idclient,
            "date"=>$date,
            "reservationDate"=>$currentDate
        ]);
        Utils::addInfoMessage('Pomyslnie zarezerwowano termin!');
            $this->generateView();
    }
    }

    public function generateView(){
        App::getRouter()->forwardTo('BandList');
    }


}
