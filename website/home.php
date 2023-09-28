<?php
session_start();
include 'Database.php';
$ID= $_SESSION["ID"];
$sql=mysqli_query($conn,"SELECT * FROM users where User_ID='$ID' ");
$row  = mysqli_fetch_array($sql);

if ($_SESSION["First_Name"] == NULL)
{
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
</head>

<body>
    <div id="main1">
        <div id="left">
            <h1>Home</h1>
        </div>
        <div id="center">
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="books.php">books</a></li>
                    <li><a href="account.php">MyAccount</a></li>
                </ul>
            </nav>
        </div>
        <div id="right">
            <b>Welcome </b><?php echo $_SESSION["First_Name"] ?> <?php echo $_SESSION["Surname"] ?></p>
            Want to Leave the Page? <br><a href="logout.php">Logout</a>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
</body>
<div id="page-container">
    <div id="content-wrap">
    </div>
    <footer id="footer">Copyright. 2022 All rights reserved.</footer>
</div>

<html>