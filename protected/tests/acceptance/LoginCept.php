<?php
$I = new WebGuy($scenario);
$I->wantTo('TEST LOGIN HALAMAN');

//login salah
$I->amGoingTo('Login dengan user dan password salah');
$I->amOnPage('/logout');
$I->amOnPage('/login');
$I->see('Username');
$I->submitForm('#login-form', array(
 'LoginForm' => array(
 'username' => 'karuniabncv',
 'password' => 'n0password'
 )));
$I->see('Incorrect username or password.');


//login benar
$I->amGoingTo('Login dengan user dan password benar');
$I->amOnPage('/login');
$I->submitForm('#login-form', array(
 'LoginForm' => array(
 'username' => 'karunia',
 'password' => 'n0password'
 )));
$I->see('Miscellaneous');

//logout user
$I->amGoingTo('Logout user yang telah login');
$I->click('karunia');
$I->click(' Logout');
$I->see('Service & Project');