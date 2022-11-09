<?php
if(isset($_POST['submit'])){
    $userData = array(
        'fname' => sanitize($_POST['fname']),
        'mname' => sanitize($_POST['mname']),
        'lname' => sanitize($_POST['lname']),
        'gender' => $_POST['gender'],
        'age' =>  Date('Y') - date('Y', strtotime($_POST['dob']))
    );

    extract($userData);

    echo 'Hello ' . $gender . ' ' . $fname . ' ' . $mname . ' ' . $lname . ' and your age is ' . $age;
}

function sanitize($str) {
    $sanitizeStr = trim($str);
    $sanitizeStr = stripslashes($sanitizeStr);
    $sanitizeStr = htmlspecialchars($sanitizeStr);

    return $sanitizeStr;
}