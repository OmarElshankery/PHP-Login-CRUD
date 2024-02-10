<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>


<div class="container">
    <div class="box form-box">
        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        <div class="field input">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name"><br>
        </div>
        <div class="field input">
            <label for="user_name">User Name</label>
            <input type="text" id="user_name" name="user_name"><br>
        </div>
        <div class="field input">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br>
        </div>
        <div class="field input">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"><br>      
        </div>
        <div class="field input">
            <label for="birth_date">Birth Date</label>
            <input type="date" id="birth_date" name="birth_date"><br>    
        </div>
        <div class="field">
            <input type="submit" value="Add User" class="btn">
        </div>
        
    </form>
    </div>
</div>

<?php
    if(isset($_POST['full_name'],$_POST['user_name'],$_POST['password'],$_POST['email'],$_POST['birth_date'])){
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];
        $rawPassword=$_POST['password'];
        $password= password_hash($rawPassword,PASSWORD_DEFAULT);
        $email=$_POST['email'];
        $birth_date=$_POST['birth_date'];
        require 'connection.php';
        $queryString=$connection->prepare('INSERT INTO users (full_name,user_name,password,email,birth_date)VALUES(?,?,?,?,?)');
        $queryString->execute([$full_name,$user_name,$password,$email,$birth_date]);
        header("Location:allusers.php");
    }


?>

</body>
</html>