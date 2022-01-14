<?php

//credenciais para o acesso ao BD

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'estoque');

$conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',USER, PASS);