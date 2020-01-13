<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\RegistrationForm;

class RegistrationCtrl {

    private $form;

    public function __construct() {

        $this->form = new RegistrationForm();
    }

public function action_registrationShow() {
    $this->generateView();
}

public function action_registrationSave() {

    // 1. Walidacja danych formularza (z pobraniem)
    if ($this->validateSave()) {
        // 2. Zapis danych w bazie
        try {

            //2.1 Nowy rekord
                        //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                $count = App::getDB()->count("clients");
                if ($count <= 20) {
                    App::getDB()->insert("clients", [
                        "login" => $this->form->login,
                        "password" => $this->form->password,
                        "phone" => $this->form->phone
                    ]);
                } else { //za dużo rekordów
                    // Gdy za dużo rekordów to pozostań na stronie
                    Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                    $this->generateView(); //pozostań na stronie edycji
                    exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                }
            Utils::addInfoMessage('Pomyślnie zapisano rekord');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
        App::getRouter()->forwardTo('loginShow');
    } else {
        // 3c. Gdy błąd walidacji to pozostań na stronie
        $this->generateView();
    }
}

public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('Registration.tpl');
    }

    public function validateSave() {
        //0. Pobranie parametrów z walidacją
       // $this->form->idclient = ParamUtils::getFromRequest('idclient', true, 'Błędne wywołanie aplikacji id');
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Błędne wywołanie aplikacji');
        $this->form->password = ParamUtils::getFromRequest('password', true, 'Błędne wywołanie aplikacji');
        $this->form->phone = ParamUtils::getFromRequest('phone', true, 'Błędne wywołanie aplikacji');

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

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów



        return !App::getMessages()->isError();
    }

}