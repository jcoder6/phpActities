<?php
   include('./config/db_connect.php');
   include('./inc/functions.php');
   
   echo $_SESSION['new-msg'];
   if(isset($_GET['convo_with'])){
      $convoWith = sanitize($_GET['convo_with']);
      $userID = $_SESSION['user-login'];
      $isExisting = isConvoExist($pdo, $convoWith, $userID);
      if($isExisting){
         header('location:' . ROOT_URL . 'index.php?convo=' . $isExisting[1] . '&name=' . $isExisting[0]);
         die();
      }

      header('location:' . ROOT_URL . 'index.php?new-msg=' . $convoWith . '&name=' . $_GET['name']);
   }  

   function isConvoExist($pdo, $convoWith, $userID){
      $ids = array(
         'convoWith' => $convoWith,
         'userID' => $userID
      );

      $query = "SELECT 
            c.*, 
            u.fname,
            u.lname
         FROM 
            convo c
         INNER JOIN
            users u 
         ON 
            u.id = IF(c.userId_1 = :userID, c.userId_2, c.userId_1)
         WHERE 
            (c.userId_1 = :convoWith OR c.userId_2 = :convoWith) 
         AND 
            (c.userId_1 = :userID OR c.userId_2 = :userID)";
      $stmt = $pdo->prepare($query);

      if($stmt->execute($ids)){
         $res = $stmt->fetch();
      }  

      if($res){
         extract($res);
         $fullName = $fname . ' ' . $lname;
         $convoID = $id;
         return array($fullName, $convoID);
      } 

      return false;
   }
?>
