<?php 
return array(
    'host' => '127.0.0.1',
    'dbname' => 'magaz',
    'charset' => 'utf8',
    'user' => 'root',
    'password' => '1111',
    'options' => [PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			  	  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			 	  PDO::ATTR_EMULATE_PREPARES   => false]
);
?>