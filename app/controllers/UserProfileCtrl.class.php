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



    public function generateViewAdmin() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('UserProfilebyAdmin.tpl');
    }

    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->idclient = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
    public function validateSave() {
        $v = new Validator();

        $phone = $v->validateFromRequest('phone', [
            'required' => true,
            'numeric' => true,
            'validator_message' => 'Niewłaściwy format numeru telefonu!'
        ]);
        $phone = $v->validateFromRequest('phone', [
            'min_length' => 9,
            'max_length' => 9,
            'validator_message' => 'Numer powinien zawierać dokładnie 9 cyfr!'
        ]);
        $email = $v->validateFromRequest('email', [
            'required' => true,
            'email' => true,
            'validator_message' => 'Niewłaściwy format email!'
            ]);
        //0. Pobranie parametrów z walidacją
       // $this->form->idclient = ParamUtils::getFromRequest('idclient', true, 'Błędne wywołanie aplikacji id');
        $this->form->phone = ParamUtils::getFromRequest('phone', true, 'Błędne wywołanie aplikacji');
        $this->form->name = ParamUtils::getFromRequest('name', true, 'Błędne wywołanie aplikacji');
        $this->form->surname = ParamUtils::getFromRequest('surname', true, 'Błędne wywołanie aplikacji');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Błędne wywołanie aplikacji');



        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste

        if (empty(trim($this->form->phone))) {
            Utils::addErrorMessage('Wprowadz numer telefonu');
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
        return true;

    }

    public function action_userProfile(){


                try {

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


            // 3. Wygenerowanie widoku
            App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));
            $this->generateView();

        }

     public function action_userSaveChanges(){
        if ($this->validateSave()){
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

        } else {
            $this->generateView();
         }
    }

    public function action_UserDelete(){
        App::getDB()->delete("clients", [
            "idclient" => ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji')
        ]);
        Utils::addInfoMessage('Pomyślnie usunięto rekord');
        App::getRouter()->forwardTo('UserList');
    }

    public function action_userSaveChangesByAdmin(){
            App::getDB()->update("clients", [
            "name" =>  $_POST['name'],
            "surname" => $_POST['surname'],
            "phone" => $_POST['phone'],
            "email" => $_POST['email'],
                ], [
            "idclient" => SessionUtils::load("userID", true)
        ]);
        Utils::addInfoMessage('Pomyślnie zapisano zmiany');
        App::getRouter()->forwardTo('UserList');
    }

    public function action_userProfileEdit(){

        //if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                /* $record = App::getDB()->get("clients", "*", [
                    "idclient" => $_SESSION["sessionID"]]);
                    */ //poprzednie dzialajace, bez frameworka

                SessionUtils::store("userID", ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji'));

                $record = App::getDB()->get("clients", "*", [
                   "idclient" => ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji')
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
            $currentID = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        //}
        // 3. Wygenerowanie widoku
        $this->generateViewAdmin();
    }







}