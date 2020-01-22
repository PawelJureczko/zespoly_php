<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\UserProfileForm;
use core\SessionUtils;

class UserProfileCtrl {

    private $form; //dane formularza

    public function __construct() {

        $this->form = new UserProfileForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('UserProfile.tpl');
    }

    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    /* public function validateSave() {
        //0. Pobranie parametrów z walidacją
       // $this->form->idclient = ParamUtils::getFromRequest('idclient', true, 'Błędne wywołanie aplikacji id');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji');
        $this->form->phone = ParamUtils::getFromRequest('phone', true, 'Błędne wywołanie aplikacji');
        $this->form->passwordrepeated = ParamUtils::getFromRequest('passwordrepeated', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        if (empty(trim($this->form->login))) {
            Utils::addErrorMessage('Wprowadź login');
        }
        if (empty(trim($this->form->password))) {
            Utils::addErrorMessage('Wprowadź haslo');
        }
        if (empty(trim($this->form->phone))) {
            Utils::addErrorMessage('Wprowadz numer telefonu');
        }

        if (empty(trim($this->form->passwordrepeated))) {
            Utils::addErrorMessage('Wprowadz ponownie haslo');
        }

        if (empty(trim($this->form->name))) {
            Utils::addErrorMessage('Wprowadź imię');
        }

        if (empty(trim($this->form->surname))) {
            Utils::addErrorMessage('Wprowadź nazwisko');
        }

        if (empty(trim($this->form->email))) {
            Utils::addErrorMessage('Wprowadź email');
        }
        if (App::getMessages()->isError()) {
            return false;
        }

    } */

    public function action_userProfile(){

            //if ($this->validateEdit()) {
                try {
                    // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                    /* $record = App::getDB()->get("clients", "*", [
                        "idclient" => $_SESSION["sessionID"]]);
                        */ //poprzednie dzialajace, bez frameworka

                   $record = App::getDB()->get("clients", "*", [
                       "idclient" => SessionUtils::load("sessionID", true)
                   ]);
                    $this->form->name = $record['name'];
                    $this->form->surname = $record['surname'];
                    $this->form->phone = $record['phone'];
                    $this->form->email = $record['email'];

                } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                    if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
                }
            //}

            // 3. Wygenerowanie widoku
            $this->generateView();
        }

     public function action_userSaveChanges(){
        App::getDB()->update("clients", [
            "name" =>  $_POST['name'],
            "surname" => $_POST['surname'],
            "phone" => $_POST['phone'],
            "email" => $_POST['email'],
                ], [
            "idclient" => SessionUtils::load("sessionID", true)
        ]);
        Utils::addInfoMessage('Pomyślnie zapisano zmiany');
        App::getRouter()->forwardTo('BandList');
    }


    public function action_changePassword(){
        echo("trzeba dorobic funkcje zmiany hasla");
        }

}