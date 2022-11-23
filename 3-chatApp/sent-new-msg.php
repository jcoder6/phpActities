<?php
   include ('./config/db_connect.php');
   include ('./inc/functions.php');

   $convoWith = sanitize($_GET['convo-with']);
   $userID = $_SESSION['user-login'];
   $msg = $_SESSION['new-msg'];

   $convoID = getConvoID($pdo, $userID, $convoWith);
   $sentMessage = sentNewMessage($pdo, $convoID, $userID, $msg);

   function getConvoID($pdo, $userID, $convoWith){
      $ids = array(
         'convoWith' => $convoWith,
         'userID' => $userID
      );

      $query = "SELECT 
            id 
         FROM 
            convo 
         WHERE 
            (userId_1 = :convoWith OR userId_2 = :convoWith) 
         AND 
            (userId_1 = :userID OR userId_2 = :userID)";

      $stmt = $pdo->prepare($query);

      if($stmt->execute($ids)){
         $res = $stmt->fetch();
         return $res['id'];   
      }
   }

   function sentNewMessage($pdo, $convoID, $userID, $msg){
      $msgData = array(
         'convo_id' => $convoID,
         'sender_id' => $userID,
         'message' => $msg
     );

     $query = "INSERT INTO messages(convo_id, sender_id, message) VALUES (:convo_id, :sender_id, :message)";
     $stmt = $pdo->prepare($query);

     if($stmt->execute($msgData)){
         unset($_SESSION['new-msg']);
         header('location:' . ROOT_URL . 'index.php?convo=' . $convoID . '&name=' . $_SESSION['receiver-name']);
     } else {
         echo 'error';
     }
   }