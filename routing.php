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
Utils::addRoute('userSaveChanges', 'UserProfileCtrl', ['admin', 'user']);
Utils::addRoute('UserProfileEdit', 'UserProfileCtrl', ['admin']);

Utils::addRoute('changePassword', 'ChangePasswordCtrl', ['admin', 'user']);
Utils::addRoute('savePassword', 'ChangePasswordCtrl', ['admin', 'user']);

Utils::addRoute('UserList', 'UserListCtrl', ['admin', 'user']);

Utils::addRoute('userSaveChangesByAdmin', 'UserProfileCtrl', ['admin']);
Utils::addRoute('UserDelete', 'UserProfileCtrl', ['admin']);

Utils::addRoute('BookBand', 'BookBandCtrl', ['admin', 'user']);
Utils::addRoute('ConfirmBookBand', 'BookBandCtrl', ['admin', 'user']);
Utils::addRoute('BookedBandList', 'BookingListCtrl', ['admin', 'user']);
Utils::addRoute('CalendaryDelete', 'BookingListCtrl', ['admin', 'user']);
//Utils::addRoute('action_name', 'controller_class_name');