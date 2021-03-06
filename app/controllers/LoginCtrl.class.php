<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;


    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        $dbid; //prywatna zmienna, stworzona do przetrzymywania indeksu rekordu z bazy danych o danym loginie

        if ($this->form->login){
            $dbid =  App::getDB()->get("clients", "idclient", [
                "login" => $this->form->login
            ]);

            //select("clients", "idclient", "login" -> $this->form->login);
        }

        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        // sprawdzenie, czy dane logowania poprawne
        // (takie informacje najczęściej przechowuje się w bazie danych)

        if ($this->form->login == App::getDB()->get("clients", "login", [
            "idclient" => $dbid ])
            &&
            $this->form->pass == App::getDB()->get("clients", "password", [
            "idclient" => $dbid]))
            {

            RoleUtils::addRole(App::getDB()->get("clients", "role", [
                "idclient" => $dbid
            ]));

            SessionUtils::store("currentRole", App::getDB()->get("clients", "role", [
                "idclient" => $dbid
            ]));

        } else if (($this->form->login == App::getDB()->get("clients", "login", [
            "idclient" => $dbid ])
            &&
            $this->form->pass != App::getDB()->get("clients", "password", [
            "idclient" => $dbid]))){
                Utils::addErrorMessage('Niepoprawne hasło');
            } // komunikat o blednym hasle dla loginu znajdujacego sie w bazie
            else if ($dbid==''){
                Utils::addErrorMessage("Konto nie istnieje");
            }
            else {
                Utils::addErrorMessage('Niepoprawny login lub hasło');

                }

        return !App::getMessages()->isError();
    }



    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            session_start();
            //SessionUtils::store($currentLogin, $this->form->login);
            //$_SESSION["sessionLogin"] = $this->form->login;
            SessionUtils::store("sessionID", App::getDB()->get("clients", "idclient",[
                "login" => $this->form->login]));
            SessionUtils::store("sessionLogin", $this->form->login);
            App::getRouter()->redirectTo("BandList");

        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('LoginView.tpl');
    }

    public function generateView() {
        //App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('LoginView.tpl');
    }

    public function action_accessdenied(){

        if (SessionUtils::load("currentRole", true)==="user"){
            Utils::addErrorMessage('Masz niewystarczające uprawnienia!');
        } else if (SessionUtils::load("currentRole", true)===""){
        Utils::addErrorMessage('Musisz się zalogować!');
        }
        $this->generateView();
    }

}
