<?php

// Database params
define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//VIEWS
define('VIEW', APPROOT . 'views');

//URLROOT
define('URLROOT', 'mvc.test');

//Sitename
define('SITENAME', 'MVC');

//Timezone
define('TIMEZONE', 'Asia/Dhaka');

//Set TimeZone
date_default_timezone_set(TIMEZONE);

define("TIMESTAMP", date("Y-m-d H:i:s"));