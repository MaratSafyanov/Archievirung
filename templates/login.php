<?php
//
include_once "../src/connect.php";
Db::initialize();
?>

<?php

    if (isset($_POST['login'])) {

            $connection = Db::$conn;
            $username = $_POST['username'];
            $password = $_POST['password'];

            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM accounts WHERE username = '$username' ";
            $select_user_query = mysqli_query($connection, $query);

                        if (!$select_user_query) {
                            die("Login Query failed" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($select_user_query)) {


                            $db_id = $row['id'];
                            $db_username = $row['username'];
                            $db_password = $row['passwort'];

                            if ($password === $db_password) {
                                $_SESSION['username'] = $db_username;
                                $_SESSION['passwort'] = $db_password;
                                header("Location:  home.php");
                            }else{

                                header("Location login.php");


                            }

                        }



}


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="text-center">

<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>

        <div class="col-sm-4">
            <form class="form-signin" action="" method="post">
                <img class="mb-4" src="" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Bitte sign in</h1>
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" required=""
                       autofocus="" name="username">
                <label for="inputPassword" class="sr-only">Password</label>
                <br>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""
                       name="password">

                <hr>

                <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Sign in">

            </form>

        </div>

        <div class="col-sm-4"></div>
    </div>

</div>
</body>




