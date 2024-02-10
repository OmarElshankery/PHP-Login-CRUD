<?php

require 'header.php';

require 'connection.php';

require "menu.php";

$queryString=$connection->prepare('SELECT * FROM users');

$queryString->execute();

$users=$queryString->fetchAll();?>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
        <?php
        foreach ($users as $user){?>
            <tbody>
            <tr>
                <th scope="row"><?= $user['id'] ?></th>
                <td><?= $user['full_name'] ?></td>
                <td><?= $user['user_name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['birth_date'] ?></td>
                <td>
                    <a href="delete.php?id=<?= $user['id'] ?>" style="text-decoration: none">
                        <i class="material-icons">delete</i>

                    </a>
                    |
                    <a href="edit.php?id=<?= $user['id'] ?>" style="text-decoration: none">
                        <i class="material-icons">app_registration</i>
                    </a>
                </td>
            </tr>
            </tbody>
<?php
        }
?>
            </table>

<?php
require 'footer.php';
