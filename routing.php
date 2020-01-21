<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('loginShow'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

App::getRouter()->setLoginRoute('accessdenied');

Utils::addRoute('accessdenied', 'LoginCtrl');
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
Utils::addRoute('userProfile', 'UserProfileCtrl', ['admin', 'user']);
Utils::addRoute('changePassword', 'UserProfileCtrl', ['admin', 'user']);
Utils::addRoute('userSaveChanges', 'UserProfileCtrl', ['admin', 'user']);
//Utils::addRoute('action_name', 'controller_class_name');