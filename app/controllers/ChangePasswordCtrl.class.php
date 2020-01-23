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
        App::getSmarty()->display('ChangePassword.tpl');
    }

    public function action_savePassword(){
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

        $this->generateView();

    }



}