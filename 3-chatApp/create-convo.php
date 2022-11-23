<?php

   if(isset($_POST['sent-new-msg'])){

      $receiverID = sanitize($_POST['receiver-id']);
      $userID = $_SESSION['user-login'];
      $msg = sanitize($_POST['send-new-msg']);
      $name = sanitize($_GET['name']);
      $isConvoCreated = createNewConvo($pdo, $receiverID, $userID);

      if($isConvoCreated){
         $_SESSION['receiver-name'] = $_GET['name'];
         $_SESSION['new-msg'] = $msg;
         echo '<script>location.href="'. ROOT_URL . 'sent-new-msg.php?convo-with=' . $receiverID . '"</script>';
      }
   }
   
   function createNewConvo($pdo, $convoWith, $userID){
      $ids = array(
         'convoWith' => $convoWith,
         'userID' => $userID
      );

      $query = "INSERT INTO convo(userId_1, userId_2) VALUES (:convoWith, :userID)";
      $stmt = $pdo->prepare($query);

      if($stmt->execute($ids)){
         return true;
      }

      return false;

   }