<aside class="flex flex-col w-[250px] bg-stone-200/50 shrink-0">
   <div class="flex flex-row justify-between items-center px-3 py-4 border-b bg-stone-50 border-stone-300">
         <a href="<?= ROOT_URL ?>" class="text-2xl font-semibold font-mono text-stone-700">ChatApp</a>
         <a href="<?= ROOT_URL ?>?all-convo=true">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
               <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>
         </a>
   </div>
   <div class="flex flex-col flex-auto overflow-y-auto">
         <p class="px-3 py-2 font-bold text-white bg-gradient-to-r from-rose-400 via-purple-500 to-blue-500 sticky top-0 z-2  text-lg">Chat with</p>
         <?php $convos = (isset($_GET['all-convo'])) ? getAllConvo($pdo, $_SESSION['user-login']) : getUserConvos($pdo, $_SESSION['user-login']) ?>
         <?php foreach($convos as $convo): ?>
            <?php if(isset($_GET['all-convo'])) : ?>
            <a href="<?= ROOT_URL ?>create-new-message.php?convo_with=<?= $convo['recieverID'] ?>&name=<?= $convo['recieverFullName'] ?>" class="flex flex-row justify-between items-center relative px-3 py-2 hover:bg-blue-600 hover:text-white transition-all border-b border-stone-300">
               <span><?= $convo['recieverFullName'] ?></span>
            </a>
            <?php else : ?>
            <a href="<?= ROOT_URL ?>index.php?convo=<?= $convo['convoID'] ?>&name=<?= $convo['recieverFullName'] ?>" class="flex flex-row justify-between items-center relative px-3 py-2 hover:bg-blue-600 hover:text-white transition-all border-b border-stone-300">
               <span><?= $convo['recieverFullName'] ?></span>
            </a>
            <?php endif; ?>
         <?php endforeach; ?>
   </div>
   
   <div class="flex flex-col gap-2">
         <a href="#" class="flex flex-row items-center gap-2 px-3 py-2">
         <?php $fn = userFullName($pdo, $_SESSION['user-login']) ?>
            <div class="w-8 h-8 flex flex-col rounded-full items-center justify-center bg-blue-500 text-white">
               <h1 class="font-black"><?= ucfirst($fn->fname[0]).ucfirst($fn->lname[0]) ?></h1>    
            </div>
            <span><?= ucfirst($fn->fname).' '.ucfirst($fn->lname) ?></span>
         </a>

         <a href="logout.php" class="flex flex-row items-center gap-2 px-3 py-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            <span>Logout</span>
         </a>
      
   </div>
</aside>