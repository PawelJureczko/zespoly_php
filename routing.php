<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('loginShow'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('BandList','BandListCtrl', ['admin', 'user']);
Utils::addRoute('BandEdit',    'BandEditCtrl', ["admin"]);
Utils::addRoute('BandDelete',  'BandEditCtrl', ["admin"]);
Utils::addRoute('BandSave',    'BandEditCtrl', ["admin"]);
Utils::addRoute('BandNew',    'BandEditCtrl', ["admin"]);
Utils::addRoute('registrationShow', 'RegistrationCtrl');
Utils::addRoute('registrationSave', 'RegistrationCtrl');
//Utils::addRoute('action_name', 'controller_class_name');