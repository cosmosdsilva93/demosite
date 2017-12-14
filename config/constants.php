<?php
#define all the constants here

define('DB', 'demosite_db');
define('TBL_SUBSCRIPTIONS', 'subscriptions');
define('DS', '/');

// domain name
$domain = $_SERVER['SERVER_NAME'];
define('WEBSITE_NAME', 'demosite');

// base url
$base_url = $domain . DS . WEBSITE_NAME . DS;
define('BASE_URL', $base_url);

//document root
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . WEBSITE_NAME);