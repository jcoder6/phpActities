<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="./dist/customize.css">
</head>
<?php 
include('./config/db_connect.php');
include('./inc/restrict.php');
include('./index_contents.php');
include('./inc/functions.php')
?>
<body class="bg-stone-200 h-screen font-mono">
<?php showMessage() ?>
    <div class="flex flex-row h-screen gap-2">

        <?php 
            include('./index-aside.php');
        ?>

        <?php 
            if(isset($_GET['search'])){
                include('./search-result.php');
            }
        ?>
        
        <?php
            include('./send-msg.php');
        ?>

<script src="./dist/script.js"></script>
</body>
</html>