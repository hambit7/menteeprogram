<?php


//use Symfony\Component\HttpFoundation\Request;
//
//$request = new Request(
//    $_POST,
//);
//
//dd($request->getContent());


//$dsn = 'mysql:dbname=books;host=localhost';
//$user = 'root';
//$password = 'root';
//
//$dbh = new PDO($dsn, $user, $password);
//$conn = \Doctrine_Manager::connection($dbh);

$conn = \Doctrine_Manager::connection('mysql://root:root@localhost/books');