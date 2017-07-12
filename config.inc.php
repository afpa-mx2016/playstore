<?php

define('SQL_DSN',      'mysql:dbname=playstore;host=localhost;charset=utf8');
define('SQL_USERNAME', 'playstore_user');
define('SQL_PASSWORD', 'playstore_user');

define('UPLOAD_DIR', 'assets/img/pl_heads/');
//List of all views that are allowed to be displayed anonymously
define('DMZ', array('','Welcome', 'LoginForm', 'LoginFormHandler'));
define('PATH_VIEW',dirname(__FILE__).'/view');