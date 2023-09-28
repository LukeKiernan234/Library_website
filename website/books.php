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
    <title> </title>
    <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


    <main>

        <div id="main1">
            <div id="left">
                <h1>Books</h1>
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
            <form action="searchprocess.php" method="post">

                <select name="Category_ID">
                    <option disabled selected="">--- Select Category --- </option>
                    <?php
                    require_once "Database.php";
                    $sql = "SELECT category_name, Category_ID FROM categories";
                    $categories = $conn->query($sql);
                    while($row = $categories->fetch_assoc())
                    {
                        echo "<option value=" . $row['Category_ID'] . ">". $row['category_name'] . "</option>";
                    }
                    ?>
                    <input type="submit">

            </form>
            <form action="searchprocesssearch.php" method="post">
                Search <input type="text" name="search"><br>

                By: <select name="column">
                    <option value="BookTitle">Book Title</option>
                    <option value="Author">Author</option>

                </select><br>
                <input type="submit">
            </form>

        </div>


    </main>


</body>

<div id="page-container">
    <div id="content-wrap">
    </div>
    <footer id="footer">Copyright. 2022 All rights reserved.</footer>
</div>


</html>