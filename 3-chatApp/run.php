<?php

    include('./config/db_connect.php');
    include('./inc/functions.php');

    if(isset($_POST['register'])){
        // echo 'login';
        $inputData = array(
            'fname' => sanitize($_POST['fname']),
            'lname' => sanitize($_POST['lname']),
            'username' => sanitize($_POST['username']),
            'pw' => md5(sanitize($_POST['pw'])) 
        );
        
        $query = "INSERT INTO users(fname, lname, username, pass) VALUES(:fname, :lname, :username, :pw)";
        $stmt = $pdo->prepare($query);

        if($stmt->execute($inputData)){
            echo '<script>location.href="'. ROOT_URL .'login.php";</script>';
        } else {
            header('location:' . ROOT_URL . 'register.php');
            die();
        }
    }

    if(isset($_POST['login'])){
        // echo 'login';
        $loginInput = array(
            'username' => sanitize($_POST['username']),
            'pw' => md5(sanitize($_POST['pw']))
        );  

        $query = "SELECT * FROM users WHERE username = :username AND pass = :pw LIMIT 1";
        $stmt = $pdo->prepare($query);

        if($stmt->execute($loginInput) && $stmt->rowCount() == 1){
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            $_SESSION['user-login'] = $res->id;
            header('location:' . ROOT_URL);
        } else {
            echo 'Incorrect Username or Password';
            header('location:' . ROOT_URL);
        }
    }

    if(isset($_POST['send-msg'])){
        if(!empty($_POST['msg'])){
            $name = $_POST['name'];
            $convoID = sanitize($_POST['convo']);
        }
    }

    if(isset($_POST['new-msg'])){
        $receiverID = sanitize($_POST['receiver-id']);
        $msg = sanitize($_POST['send-new-msg']);

        echo $receiverID . $msg;
    }