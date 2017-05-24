<?php

define('INDEX', time() + microtime());
error_reporting(E_ALL);

require_once('Private/Php/Functions.php');
require_once('Private/Php/Enums.php');
require_once('Private/Php/Config.php');
require_once('Private/Php/Templates.php');
require_once('Private/Php/Database.php');
require_once('Private/Php/User.php');
require_once('Private/Php/Auth.php');

$scontent = '';
$pagescripts = array(
    'custom' => '',
    'include' => '',
);
$pagemenu = array(
    'admin' => '',
    'projekt' => '',
    'artikel' => '',
    'kunden' => '',
    'finanzen' => '',
);
$pagetitle = 'Event4-You Management';

if ($Auth->IsLoggedin) {
    require_once('Private/PhpPages/Home.php');
} else 
    require_once('Private/PhpPages/Login.php');

$body = LoadTemplate(($Auth->IsLoggedin ? 'HtmlBody' : 'LoginBody'), array(
    'content' => $scontent,
    'page' => array(
        'loggedin' => ($Auth->IsLoggedin ? 'true' : 'false'),
        'trylogin' => ($Auth->LoginTried ? 'true' : 'false'),
        'title' => $pagetitle,
        'menu' => $pagemenu,
    ),
    'script' => $pagescripts,
    'user' => $Auth->User,
));
echo $body;