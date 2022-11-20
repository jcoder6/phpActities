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