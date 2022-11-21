<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>
<?php 
include('./config/db_connect.php');
include('./inc/restrict.php');
include('./index_contents.php');
?>
<body class="bg-stone-200 h-screen font-mono">
    <div class="flex flex-row h-screen gap-2">

        <aside class="flex flex-col w-[250px] bg-stone-200/50 shrink-0">
            <div class="flex flex-row justify-between items-center px-3 py-4 border-b bg-stone-50 border-stone-300">
                <h1 class="text-2xl font-semibold font-mono text-stone-700">ChatApp</h1>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                </svg>
            </div>
            <div class="flex flex-col flex-auto overflow-y-auto">
                <p class="px-3 py-2 font-bold text-white bg-gradient-to-r from-rose-400 via-purple-500 to-blue-500 sticky top-0 z-10 text-lg">Chat with</p>
                <?php $convos = getUserConvos($pdo, $_SESSION['user-login']) ?>
                <?php foreach($convos as $convo): ?>
                <a href="<?= ROOT_URL ?>index.php?convo=<?= $convo['convoID'] ?>&name=<?= $convo['recieverFullName'] ?>" class="flex flex-row justify-between items-center relative px-3 py-2 hover:bg-blue-600 hover:text-white transition-all border-b border-stone-300">
                    <span><?= $convo['recieverFullName'] ?></span>
                </a>
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
        
        <div class="flex-auto flex flex-col px-2 bg-stone-200/50">
        <?php 
            if(isset($_GET['convo']) && isset($_GET['name'])){
                $convoID = $_GET['convo'];
                $arrayFnameReciever = explode(' ', $_GET['name']);
                $receiverInitial = ucfirst($arrayFnameReciever[0][0]).ucfirst($arrayFnameReciever[1][0]);
                $receiverFullName = ucfirst($arrayFnameReciever[0]) . ' ' . ucfirst($arrayFnameReciever[1]);
                $conversations = getConvo($pdo, $convoID);
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
            </div>
            <div class="flex flex-col-reverse flex-auto  bg-stone-50 rounded-2xl p-5 overflow-y-auto shadow-xl">
                <?php 
                    if(isset($_GET['convo']) && isset($_GET['name'])) {
                        displayConvo($conversations);
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
                        <textarea name="msg" id="msg" class="w-full rounded-2xl resize-none p-2 focus:ring-none focus:outline-none" required></textarea>
                        <button type="submit" name="send-msg" class="px-3 py-2 bg-blue-700 rounded-md hover:bg-blue-800 text-stone-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                        </button>
                    </div>
                </form>  
            </div>
            <?php endif; ?> 
        </div>
        
        <!-- <div class="w-[300px]">

        </div> -->
    </div>
</body>
</html>