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


$Query = $conn->Query(sprintf("UPDATE book
                                      SET Reserved = 'N' 
                                      WHERE ISBN = '%s'", 
                                      $conn->escape_string($_POST['ISBN'])));
                                        
$Query = $conn->Query(sprintf("DELETE FROM reserved_book
                                      WHERE ISBN = '%s'", 
                                      $conn->escape_string($_POST['ISBN'])));
                                    
echo "<br>";
echo "<div class='Form2'><h2>Book has been unreserved if code was correct.</h2></div>";
echo "<div class='Form2'><h2>Check your account if the book has been unreserved.</h2></div>";
echo "<br>";

header("Refresh:0; url=account.php");

?>