<?php

return array(
	'db_host' => 'localhost',
    'db_name' => 'airline',
    'db_user' => 'root',
    'db_password' => 'vertrigo',
    'db_charset' => 'utf8',
    'db_options' => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false )
);