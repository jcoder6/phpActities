<?php
   if(!isset($_SESSION['user-login'])){
      header('location:' .ROOT_URL.'login.php');
      die();
   }
