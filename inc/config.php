<?php

$url = parse_url ( getenv (" CLEARDB_DATABASE_URL ") ) ;


$server = $url [" us-cdbr-iron-east-02.cleardb.net "];
$username = $url [" be505b883b85da "];
$password = $url [" b22b5198 "];
$db = substr ( $url [" heroku_a6c93f827357fde "] , 1) ;
$conn = new mysqli ( $server , $username , $password , $db) ;
