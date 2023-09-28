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
            <h1>Results</h1>
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
    <div class="account">
        <?php

require 'Database.php';

$search = $_POST['Category_ID'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdproject";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from book where Category_ID like '%$search%'";

$result = $conn->query($sql);
?>

        <?php
if ($result->num_rows > 0){
    ?>
        <table>
            <tr>
                <td>ISBN</td>
                <td>BookTitle</td>
                <td>Author</td>
                <td>Eddition</td>
                <td>Year id</td>
                <td>Category ID</td>
                <td>Reserved ID</td>
            </tr>
            <?php
      $i=0;
while($row = $result->fetch_assoc() ){
    ?>
            <tr>
                <td><?php echo $row["ISBN"]."  "?></td>
                <td><?php echo $row["BookTitle"]."  "?></td>
                <td><?php echo $row["Author"]."  "?></td>
                <td><?php echo $row["Eddition"]."  "?></td>
                <td><?php echo $row["Year"]."  "?></td>
                <td><?php echo $row["Category_ID"]."  "?></td>
                <td><?php echo $row["Reserved"]."   ";?></td>
            </tr>
            <?php
			$i++;
			}
			?>
            <table>
                <?php

} else {
	echo "0 records";
}



$conn->close();

?>
                <h1>Reserve A Book</h1>
                <form action="Reservepro.php" method="POST">
                    ISBN Of The Book:<br>
                    <input type="text" name="ISBN" required><br>
                    <input type="submit" value="Submit">
                </form>
    </div>
</body>

<div id="page-container">
    <div id="content-wrap">

    </div>
    <footer id="footer">Copyright. 2022 All rights reserved.</footer>
</div>


</html>