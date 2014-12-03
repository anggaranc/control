<?php
$I = new WebGuy($scenario);
$I->wantTo('klik tes semua menu');

//login benar
$I->amGoingTo('Login');
$I->amOnPage('/login');
$I->submitForm('#login-form', array(
 'LoginForm' => array(
 'username' => 'karunia',
 'password' => 'n0password'
 )));
$I->see('Miscellaneous');

//klik project
$I->click('Project');
$I->see('Customer');
$I->see('Customer Branch');
$I->see('Brand');
$I->see('Module Type');
$I->see('Stock');
$I->see('Service Point');
$I->see('Engineer');

//klik Miscellaneous
$I->click('Miscellaneous');
$I->see('City');

//klik System
$I->click('System');
$I->see('User');

//logout user
$I->amGoingTo('Logout user yang telah login');
$I->click('karunia');
$I->click(' Logout');
