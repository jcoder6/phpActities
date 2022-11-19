<?php
   include('constants.php');

   $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
   $pdo = new PDO($dsn, DB_USER, DB_PASS);
   $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::FETCH_OBJ);
