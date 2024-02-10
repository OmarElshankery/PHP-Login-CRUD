<?php

require 'header.php';

require 'menu.php'; ?>



<div class="container mt-4">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <h2>Login:</h2><hr>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<?php
if(isset($_POST['username'], $_POST['password']) && !empty($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];
    require 'connection.php';
    $queryString=$connection->prepare('SELECT user_name,password FROM users WHERE user_name=?');
    $queryString->execute([$username]);
    $user=$queryString->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($user)){
            $dbLoginPassword=$user[0]['password'];
            if (password_verify($password,$dbLoginPassword)){
                header("Location:allusers.php");
            }else{
                echo "Username Or Password Incorrect";
            }
    }else{
        echo "Username Not Exist";
    }


}
?>

<?php require 'footer.php';