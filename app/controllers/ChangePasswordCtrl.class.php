<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\ChangePasswordForm;
use core\SessionUtils;

class ChangePasswordCtrl {

        private $form;

        public function __construct(){

            $this->form = new ChangePasswordForm();
        }

        public function action_changePassword(){

            $this->generateView();
        }

        public function generateView(){
            //App::getSmarty()->assign('currentUser', SessionUtils::load('sessionLogin', true));

            App::getSmarty()->display('ChangePassword.tpl');

        }

        public function validateSave(){
            $v = new Validator();

            $password = $v->validateFromRequest('newpassword', [
                'required' => true,
                'min_length' => 6,
                'validator_message' => 'Haslo musi miec conajmniej 6 znaków!'
            ]);

            $this->form->newpassword = ParamUtils::getFromRequest('newpassword', true, 'Błędne wywołanie aplikacji');
            $this->form->newpasswordrepeated = ParamUtils::getFromRequest('newpasswordrepeated', true, 'Błąd');
            $this->form->currentpassword = ParamUtils::getFromRequest('currentpassword', true, 'Bład');

                if (App::getMessages()->isError()){
                return false;
                }
                if (empty(trim($this->form->newpassword))) {
                Utils::addErrorMessage('Wprowadź haslo');
                }
                if (empty(trim($this->form->newpasswordrepeated))) {
                Utils::addErrorMessage('Wprowadź haslo');
                }
                if (empty(trim($this->form->currentpassword))) {
                Utils::addErrorMessage('Wprowadź haslo');
                }
                return !App::getMessages()->isError();
        }


        public function action_savePassword(){
            if ($this->validateSave()){
            try {
                $record = App::getDB()->get("clients", "password", [
                    "idclient" => SessionUtils::load("sessionID", true)
                ]);


                if ($_POST['currentpassword']!=$record){

                    Utils::addErrorMessage('Niepoprawne hasło!');

                }
                if ($_POST['newpassword']!=$_POST['newpasswordrepeated']){

                    Utils::addErrorMessage('Wprowadzone hasła są różne!');

                }

                if ($_POST['currentpassword']===$record && $_POST['newpassword']===$_POST['newpasswordrepeated']){


                    App::getDB()->update("clients", ["password" => $_POST['newpassword']],[
                        "idclient" => SessionUtils::load("sessionID", true)
                    ]);
                    Utils::addInfoMessage('Hasło zmienione!');
                }
            }
                catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
            }
            $this->generateView();
        } else {
            $this->generateView();
        }
        }


}