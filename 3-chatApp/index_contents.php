<?php
function getUserConvos($pdo, $userID){
   
   $userConvoWith = array();
   
   try {
      $query = "SELECT 
            c.*, 
            u.fname, 
            u.lname, 
            IF(c.userId_1 = $userID, c.userId_2, c.userId_1) AS recieverID 
         FROM 
            convo c
         INNER JOIN
            users u 
         ON 
            u.id = IF(c.userId_1 = $userID, c.userId_2, c.userId_1)
         WHERE 
            userId_1 = $userID 
         OR userId_2 = $userID";

      $stmt = $pdo->prepare($query);
      if($stmt->execute()){
         $res = $stmt->fetchAll(PDO::FETCH_OBJ);
         foreach($res as $r){
            array_push(
               $userConvoWith, 
               [
                  'convoID' => $r->id,
                  'recieverID' => $r->recieverID, 
                  'recieverFullName' => ucwords($r->fname) . ' ' . ucwords($r->lname)
               ]
            );
         }
      }
   } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
   }

   return $userConvoWith;
}

function userFullName($pdo, $userID) {
   $query = "SELECT fname, lname FROM users WHERE id = ? LIMIT 1";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(1, $userID);
   if($stmt->execute()){
      return $stmt->fetch(PDO::FETCH_OBJ);

   }
}

function getConvo($pdo, $convoID) {
   $query = "SELECT 
         *  
      FROM 
         messages
      WHERE 
         convo_id = :convoID 
      ORDER BY
         created_at
      DESC
      LIMIT 16";
   $stmt = $pdo->prepare($query);

   if($stmt->execute(['convoID' => $convoID])){
      return $stmt->fetchAll(PDO::FETCH_OBJ);
   } else {
      echo 'error';
      die;
   }
}

function displayConvo($conversations) {   
   foreach($conversations as $conversation) {
       if($conversation->sender_id == $_SESSION['user-login']){
           echo '<div class="sent flex flex-row justify-end mt-3 mb-5 ">
                   <span class=" rounded-2xl text-stone-50 bg-blue-500 p-3 max-w-md">'.
                       $conversation->message
                   .'</span>
               </div>';
       } else {
           echo '<div class="recv flex flex-row justify-start mt-3 mb-5">
                   <span class="border border-stone-200 rounded-2xl bg-stone-200 p-3 max-w-md">'.
                       $conversation->message
                   .'</span>
               </div>';
       }
   }
}