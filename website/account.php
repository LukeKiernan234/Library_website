<?php
session_start();
include 'Database.php';
$ID= $_SESSION["ID"];
$sql=mysqli_query($conn,"SELECT * FROM users where User_ID='$ID' ");
$row  = mysqli_fetch_array($sql);
$result = mysqli_query($conn,"SELECT * FROM users");

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
</head>

<body>


    <main>

        <div id="main1">
            <div id="left">
                <h1>Account</h1>
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


            <table>
                <tr>
                    <th>Username</td>
                    <th><?php echo $_SESSION["UserName"]; ?></th>
                </tr>
                <tr>
                    <th>First Name</td>
                    <th><?php echo $_SESSION["First_Name"]; ?></th>
                </tr>
                <tr>
                    <th>Surname</td>
                    <th><?php echo $_SESSION["Surname"]; ?></th>
                </tr>
                <tr>
                    <th>Date of birth</td>
                    <th><?php echo $_SESSION["Date_of_birth"]; ?></th>
                </tr>
                <tr>
                    <th>Email</td>
                    <th><?php echo $_SESSION["Email"]; ?></th>
                </tr>
                <tr>
                    <th>Eir Code</td>
                    <th><?php echo $_SESSION["Eir_Code"]; ?></th>
                </tr>
                <tr>
                    <th>phone number</td>
                    <th><?php echo $_SESSION["phone_number"]; ?></th>
                </tr>



                </tr>

            </table>
            <h1> books reserved </h1>

            <?php
    $Query = $conn->Query(sprintf("SELECT book.ISBN, book.BookTitle 
											FROM reserved_book 
											INNER JOIN book 
											ON reserved_book .ISBN=book.ISBN 
											WHERE reserved_book.UserName = '%s'", $_SESSION['UserName']));
			
			if ($Query->num_rows == 0) 
			{
				echo "<div class='Form2'><h2>No books have been reserved.</h2></div>"; 
			}
			
			
			while($Row = mysqli_fetch_array($Query))
			{

				echo "<div class=\"Form2\">";
				echo '<br /> ISBN:       ' .$Row['ISBN'];  
				echo '<br /> Book Title: ' .$Row['BookTitle'];  
				echo '<br /> <br />';
				echo("</tr>\n");
				echo "</div>";
				echo "<br>";
			}
			echo "</table>\n";
			
			echo "</select><br><br>";
			
			echo "<div class=\"Form2\">";
			echo "<form action=\"Unreserve.php\" method=\"POST\">";
			echo "ISBN Of The Book:<br>";
			echo "<input type=\"text\" name=\"ISBN\" required ><br>";
			echo "<input type=\"submit\" value=\"Submit\">";
			echo "</form>";
			echo "</div>";
	
	?>
        </div>




    </main>


</body>

<div id="page-container">
    <div id="content-wrap">
    </div>
    <footer id="footer">Copyright. 2022 All rights reserved.</footer>
</div>

</html>