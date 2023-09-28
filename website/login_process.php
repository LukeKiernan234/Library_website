<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'Database.php';
    $sql = mysqli_query($conn,"SELECT * FROM users where UserName='$Username' and Password='$pass'");
    $row = mysqli_fetch_array($sql);

    if(is_array($row))
    {

        $_SESSION["ID"] = $row['User_ID'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["First_Name"]=$row['First_Name'];
        $_SESSION["Surname"]=$row['Surname'];
        $_SESSION["Date_of_birth"]=$row['Date_of_birth'];
        $_SESSION["Eir_Code"]=$row['Eir_Code'];
        $_SESSION["phone_number"]=$row['phone_number'];
        $_SESSION["UserName"]=$row['UserName'];


        header("Location: home.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>