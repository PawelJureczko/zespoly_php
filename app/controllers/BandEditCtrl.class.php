<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\BandEditForm;
use core\SessionUtils;

class BandEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new BandEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją
        $this->form->id = ParamUtils::getFromRequest('idband', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->musictype = ParamUtils::getFromRequest('musictype', true, 'Błędne wywołanie aplikacji');
        $this->form->ishired = ParamUtils::getFromRequest('ishired', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź nazwę');
        }
        if (empty(trim($this->form->musictype))) {
            Utils::addErrorMessage('Wprowadź gatunek muzyki');
        }
        if (empty(trim($this->form->ishired))) {
            Utils::addErrorMessage('Wprowadź informacje czy zespol jest obecnie dostepny');
        }

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów



        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->idband = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_BandNew() {
               $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_BandEdit() {
        // 1. walidacja id osoby do edycji

        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("bands", "*", [
                    "idband" => $this->form->idband
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->idband = $record['idband'];
                $this->form->name = $record['name'];
                $this->form->musictype = $record['musictype'];
                $this->form->ishired = $record['ishired'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_BandDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("bands", [
                    "idband" => $this->form->idband
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('BandList');
    }

    public function action_BandSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->idband == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20

                        App::getDB()->insert("bands", [
                            "name" => $this->form->name,
                            "musictype" => $this->form->musictype,
                            "ishired" => $this->form->ishired
                        ]);

                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("bands", [
                        "name" => $this->form->name,
                        "musictype" => $this->form->musictype,
                        "ishired" => $this->form->ishired
                            ], [
                        "idband" => $this->form->idband
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('BandList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));
        App::getSmarty()->display('BandEdit.tpl');
    }

}
