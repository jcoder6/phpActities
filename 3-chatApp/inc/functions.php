<?php

function sanitize($str) {
   return htmlspecialchars(stripslashes(trim($str)));
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