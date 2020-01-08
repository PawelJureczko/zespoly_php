<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('loginShow'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('BandList','BandListCtrl');
Utils::addRoute('BandEdit',    'BandEditCtrl');
Utils::addRoute('BandDelete',  'BandEditCtrl');
Utils::addRoute('BandSave',    'BandEditCtrl');
Utils::addRoute('BandNew',    'BandEditCtrl');
//Utils::addRoute('action_name', 'controller_class_name');