<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->post('/cadastrar', 'AuthController::cadastrar');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/home', 'HomeController::index');
$routes->post('/verify-email', 'AuthController::verifyEmail');
$routes->post('/check_email/(:any)', 'AuthController::confirmUserEmailAccess/$1');
$routes->get('/confirm-email-view/(:any)', 'AuthController::confirmEmailView/$1');

$routes->get('/forgotPassword', 'ForgotPassword::forgot_password');
$routes->post('/sendPasswordEmail', 'ForgotPassword::resetPassword');
$routes->post('/resetPassword/(:any)', 'ForgotPassword::updatePassword/$1');
$routes->get('/changePassword/(:any)', 'ForgotPassword::changePassword/$1');

$routes->get('/profile/(:any)', 'AuthController::profile/$1');
$routes->post('/update_profile/(:any)', 'HomeController::update_profile/$1');