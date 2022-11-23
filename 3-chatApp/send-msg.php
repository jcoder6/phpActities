<div class="flex-auto flex flex-col px-2 bg-stone-200/50">
        <?php 
            if(isset($_SESSION['receiver-name'])){
                unset($_SESSION['receiver-name']);
            }
            if(isset($_GET['convo']) && isset($_GET['name'])){
                $convoID = $_GET['convo'];
                $arrayFnameReciever = explode(' ', $_GET['name']);
                $receiverInitial = ucfirst($arrayFnameReciever[0][0]).ucfirst($arrayFnameReciever[1][0]);
                $receiverFullName = $_GET['name'];
                $conversations = getConvo($pdo, $convoID);
            } else if (isset($_GET['name'])) {
               $arrayFnameReciever = explode(' ', $_GET['name']);
               $receiverInitial = ucfirst($arrayFnameReciever[0][0]).ucfirst($arrayFnameReciever[sizeof($arrayFnameReciever) - 1][0]);
               $receiverFullName = $_GET['name'];
            } else {
                $receiverInitial = '<3';
                $receiverFullName = 'Welcome to Chat App!';
            }
        ?>
            <div class="flex flex-row px-4 py-3 items-center gap-2">
                <div class="w-8 h-8 flex flex-col rounded-full items-center justify-center bg-blue-500 text-white">
                    <h1 class="font-black"><?= $receiverInitial ?></h1>
                </div>
                <h5 class="text-sm font-semibold "><?= $receiverFullName ?></h5>
                <?php  if(!isset($_GET['convo']) && !isset($_GET['name']) && !isset($_GET['new-msg'])) : ?>
                <form action="" method="GET" class="search-container">
                    <label for="search">New Message</label>
                    <input type="search" id="search" name="search" class="search-input" placeholder="New message to..." required/>
                    <button type="submit" class="search-btn">Search</button>
                </form>
                <?php endif; ?> 
            </div>
            <div class="flex flex-col-reverse flex-auto  bg-stone-50 rounded-2xl p-5 overflow-y-auto shadow-xl">
                <?php 
                    if(isset($_GET['convo']) && isset($_GET['name'])) { 
                        displayConvo($conversations);
                    } else if(isset($_GET['new-msg'])) {
                        echo '';
                    } else {
                        echo '<div class="no-convo">Choose who you want to convo with... </div>';
                    }
                ?>
            </div>
            <?php  if(isset($_GET['convo']) && isset($_GET['name'])) : ?>
               <div class="py-4">
                  <form action="run.php" method="POST">
                     <div class="flex flex-row gap-3">
                           <input type="hidden" name="convo" value="<?= $convoID ?>" required>
                           <input type="hidden" name="name" value="<?= $receiverFullName ?>" required/>
                           <textarea name="msg" id="msg" class="w-full rounded-2xl resize-none p-2 focus:ring-none focus:outline-none" placeholder="New messgae..." required></textarea>
                           <button type="submit" name="send-msg" class="px-3 py-2 bg-blue-700 rounded-md hover:bg-blue-800 text-stone-100">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                              </svg>
                           </button>
                     </div>
                  </form>  
               </div>
            <?php endif; ?> 

            <?php if(isset($_GET['new-msg'])) : ?>
               <div class="py-4">
                  <form action="#" method="POST">
                     <div class="flex flex-row gap-3">
                           <input type="hidden" name="receiver-id" value="<?= $_GET['new-msg'] ?>">
                           <textarea name="send-new-msg" id="msg" class="w-full rounded-2xl resize-none p-2 focus:ring-none focus:outline-none" placeholder="New messgae..." required></textarea>
                           <button type="submit" name="sent-new-msg" class="px-3 py-2 bg-blue-700 rounded-md hover:bg-blue-800 text-stone-100">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                              </svg>
                           </button>
                     </div>
                  </form>  
               </div>
            <?php include('./create-convo.php') ?>
            <?php endif; ?>
        </div>
        
        <!-- <div class="w-[300px]">

        </div> -->
    </div>