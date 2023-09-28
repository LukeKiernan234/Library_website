<?php
    session_start();
?>

<!DOCTYPE html>

<html>
<!--this is the login page this is the first page of the site it allows the user to login to the site and create a session from login in-->

<head>
    <title> </title>
    <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
</head>

<body>

    <main>
        <div id="login-imfo">
            <form action="login_Process.php" method="post" enctype="multipart/form-data">
                <p>username:
                    <input type="text" name="Username" required="required">
                </p>
                <p>Password:
                    <input type="password" class="form-control" name="pass" required="required">
                </p>
                <button type="submit" name="save">Login</button>
                <input type="button" onclick="location.href='Create-accout.php';" value="create an account" />
            </form>
        </div>
    </main>


</body>
<div id="page-container">
    <div id="content-wrap">
        <div id="page-container">
            <div id="content-wrap">
                <!-- all other page content -->
            </div>
            <footer id="footer">Copyright. 2022 All rights reserved.</footer>
        </div>



</html>