<?php

   if(isset($_GET['search'])){
      $search = sanitize($_GET['search']);
      $search = explode(' ', $search);
      $search = '%' . $search[0]  . '%';

      $query = "SELECT * FROM users WHERE fname LIKE '$search' OR  lname LIKE '$search'";
      $stmt = $pdo->prepare($query);

      if($stmt->execute()){
         $searchResult = $stmt->fetchAll(PDO::FETCH_OBJ);
      } else {
         echo 'error';
      }
   }

?>

<div class="overlay"></div>
<a href="<?= ROOT_URL ?>">
   <div class="close">
      <span></span><span></span>
   </div>
</a>
<section class="search-result-container">
   <div class="result-header">Search Result</div>
   <div class="result-container">
      <?php if(sizeof($searchResult) == 0) : ?>
         <div class="no-result">No Result Found...</div>
      <?php endif; ?>
      <?php foreach($searchResult as $sr): ?>
         <div class="res">
         <a href="<?= ROOT_URL ?>create-new-message.php?convo_with=<?= $sr->id ?>&name=<?= ucfirst($sr->fname) . ' ' . ucfirst($sr->lname) ?>" class="flex flex-row items-center gap-2 px-3 py-2">
            <div class="w-8 h-8 flex flex-col rounded-full items-center justify-center bg-blue-500 text-white">
                  <h1 class="font-black"><?= ucfirst($sr->fname[0]) . ucfirst($sr->lname[0])?></h1>    
            </div>
            <span><?= ucfirst($sr->fname) . ' ' . ucfirst($sr->lname)?></span>
         </a>
      </div>
      <?php endforeach; ?>
   </div>
</section>

