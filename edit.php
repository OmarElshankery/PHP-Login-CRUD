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
<?php 
require 'connection.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $oldString=$connection->prepare('SELECT * FROM users WHERE id=?');
    $oldString->execute([$id]);
    $user=$oldString->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="box form-box">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
        
                <input type="hidden" name="id" value="<?= $user['id']?>">
                
                <div class="field input">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value="<?= $user['full_name']?>"><br>
                </div>
                
                <div class="field input">
                    <label for="user_name">User Name</label>
                    <input type="text" id="user_name" name="user_name" value="<?= $user['user_name']?>"><br>
                </div>
                
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $user['email']?>"><br>
                </div>

                <div class="field input">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" id="birth_date" name="birth_date" value="<?= $user['birth_date']?>"><br>   
                </div>
                
                <input type="submit" value="Update User" class="btn">
            </form>
        </div>
    </div>
<?php
}

?>

<?php
    if(isset($_POST['full_name'],$_POST['user_name'],$_POST['id'],$_POST['email'],$_POST['birth_date'])){
        $id=$_POST['id'];
        $full_name=$_POST['full_name'];
        $user_name=$_POST['user_name'];
        $email=$_POST['email'];
        $birth_date=$_POST['birth_date'];

        $queryString=$connection->prepare('UPDATE users SET full_name=?,user_name=?,email=?,birth_date=? WHERE id=?');
        $queryString->execute([$full_name,$user_name,$email,$birth_date,$id]);
        header("Location:allusers.php");
    }


?>

</body>
</html>