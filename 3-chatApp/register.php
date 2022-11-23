<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>
<?php  
    include('./config/db_connect.php');
    include('./inc/functions.php'); 
?>
<body class="bg-stone-50">
<?php showMessage() ?>
    <div class="flex flex-col justify-center items-center h-screen ">
        <div class="w-1/5 bg-white rounded-lg shadow-xl p-5">
            <div class="px-3 py-4 mb-4">
                <h1 class=" text-2xl font-mono ">ChatApp Registration</h1>
                <p class="text-stone-500">Please fill all fields.</p>
            </div>
            <hr class="my-4">
            <form action="run.php" method="POST">
                <div class="mb-4">
                    <label for="fname">Firstname</label>
                    <input type="text"
                        class="px-2 py-1 rounded-md border border-stone-400 outline-none focus:ring-2 focus:ring-blue-600 w-full"
                        name="fname" id="fname" required>
                </div>
                <div class="mb-4">
                    <label for="lname">Lastname</label>
                    <input type="text"
                        class="px-2 py-1 rounded-md border border-stone-400 outline-none focus:ring-2 focus:ring-blue-600 w-full"
                        name="lname" id="lname" required>
                </div>
                <div class="mb-4">
                    <label for="username">Username</label>
                    <input type="text"
                        class="px-2 py-1 rounded-md border border-stone-400 outline-none focus:ring-2 focus:ring-blue-600 w-full"
                        name="username" id="username" required>
                </div>
                <div class="mb-4">
                    <label for="pw">Password</label>
                    <input type="password"
                        class="px-2 py-1 rounded-md border border-stone-400 outline-none focus:ring-2 focus:ring-blue-600 w-full"
                        name="pw" id="pw" required>
                </div>
                <div class="flex flex-row justify-between items-center">
                    <input type="submit" class="px-3 py-2 bg-blue-700 rounded-md hover:bg-blue-800 text-stone-100" name="register" />
                    <a href="login.php" class="text-blue-600 font-light hover:text-blue-800">Login</a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>