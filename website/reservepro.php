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
    <meta charset="utf-8">

    <head>
        <title> </title>
        <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
    </head>

<body>

    <div div class="header">
        <div class="container">


            <div id="main1">
                <div id="left">
                    <h1>reserve</h1>
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
	
		if($_SERVER['REQUEST_METHOD'] != 'POST' || empty($_POST)) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>You must enter an ISBN code into the form.</h2></div>";
			echo "<br>";
			echo "<div class='Form'><h3><a href='reserve.php'>Try again</a> <br></h3></div>";
			echo "<div class=\"clearfix\"></div>";
			echo "<div  class=\"footer\">";
			echo "<div class=\"container\">";
			echo "</div>";
			echo "</div>";
			exit;
		}

	
		
		//Check if book exists.
		$Query = $conn->Query(sprintf("SELECT * 
										FROM Book
										WHERE ISBN = '%s'", 
										($_POST['ISBN'])
									 )
							 );
		
		//Check if book isn't reserved.
		$Query = $conn->Query(sprintf("SELECT * 
										FROM Book
										WHERE ISBN = '%s'
										AND Reserved = 'N'",
										($_POST['ISBN'])
									 )
							 );
				
		if ($Query->num_rows == 0) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>The book is already reserved by a member, try another book.</h2></div>";
			echo "<div class='Form2'><h2>Or the ISBN code you have entered didn't match.</h2></div>";
			echo "<br>";
			
			echo "<div class='Form'><h3><a href='books.php'>Try again?</a> <br></h3></div>";

			
			echo "<div class=\"clearfix\"></div>";
			echo "<div  class=\"footer\">";
			echo "<div class=\"container\">";
			echo "<p>Copyright. 2016 All rights reserved.</p>";
			echo "</div>";
			echo "</div>";
			exit;
		}
		
		$Query = $conn->Query(sprintf("UPDATE Book
										SET Reserved = 'Y' 
										WHERE ISBN = '%s'",
										$conn->escape_string($_POST['ISBN'])
									 )
							 );
							 
		if($Query) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>The book you have selected was reserved successfully.</h2></div>";
			echo "<br><br>";
			
			echo "<div class='Form'><h3><a href='account.php'>View your account</a> <br></h3></div>";

		} 
		

		$Query = $conn->Query(sprintf("SELECT ISBN 
										From Book
										WHERE ISBN = '%s'",
										$conn->escape_string($_POST['ISBN'])
									 )
							 );
							 
		$Result = $Query->fetch_assoc();
		

		$Query = $conn->Query(sprintf("INSERT INTO reserved_book(ISBN, UserName, ReservedDate) 
										VALUES ('%s', '%s', '%s')", $Result['ISBN'], $_SESSION['UserName'],date('Y-m-d H:i:s')
									 )
							 );
	?>
    </div>
</div>

</body>

<div id="page-container">
    <div id="content-wrap">
    </div>
    <footer id="footer">Copyright. 2022 All rights reserved.</footer>
</div>


</html>