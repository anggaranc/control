<?php
$I = new WebGuy($scenario);
$I->wantTo('Test city');

//login benar
$I->amGoingTo('Login');
$I->amOnPage('/login');
$I->submitForm('#login-form', array(
 'LoginForm' => array(
 'username' => 'karunia',
 'password' => 'n0password'
 )));

//klik Miscellaneous
$I->click('Miscellaneous');
$I->see('Province');
$I->click('Province');
$I->see('Action');
$I->click('Action button[type=submit]');
$I->see('Create Province');
$I->click('Create Province');


//logout user
$I->amGoingTo('Logout user yang telah login');
$I->click('karunia');
$I->click(' Logout');