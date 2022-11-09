<?php
session_start();
define('ROOT_URL', 'http://localhost/phpActivity/2-crud-student-info-php/');

// create a $dsn variable for better readabilty.
# NOTE THAT '$dsn' VARIABLE IS OPTIONAL.
$dsn = 'mysql:host=localhost;dbname=phpactivity-ws';
$pdo = new PDO($dsn, 'root', '');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

function sanitize($str) {
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str);

    return $str;
}

function messageNotif($messagetype, $message) {
    $_SESSION['msg'] = '<div class="message" data-messageType=' . $messagetype . '>' . $message . '</div>';
  }
  
  function showMessage() {
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
  }

