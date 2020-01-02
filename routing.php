<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('BandList'); #default action
//App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('BandList','BandListCtrl');
//Utils::addRoute('action_name', 'controller_class_name');