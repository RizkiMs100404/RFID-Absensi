<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Page::login');

$routes->get('/', 'Page::home');
$routes->get('about', 'Page::about');
$routes->get('team', 'Page::team');
$routes->get('gallery', 'Page::gallery');
$routes->get('guide', 'Page::guide');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/siswa', 'Admin::siswa');

$routes->post('/auth/set-session', 'Admin::setSession');
$routes->get('/testing', 'Page::testing');

$routes->get('/logout', 'Admin::logout');

$routes->get('pages/testing', 'Page::testing');