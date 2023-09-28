<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/html1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--this is the login page this is the first page of the site it allows the user to login to the site and create a session from login in-->

<head>

    <link rel="stylesheet" type="text/css" href="Assets/CSS/site.css">
</head>

<body>
    <header>
        <h1>
        </h1>

    </header>

    <main>
        <div id="login-imfo">
            <p>create acount</p>
            <form method="post">
                <p>Username:
                    <input type="text" name="Username" required>
                </p>
                <p>First Name:
                    <input type="text" name="First_Name" required>
                </p>
                <p>Surname:
                    <input type="text" name="Surname" required>
                </p>
                <p>Date_of_birth:
                    <input type="date" name="Date_of_birth" required>
                </p>
                <p>Email:
                    <input type="email" name="Email" requird>
                </p>
                <p>Eir code:
                    <input type="text" name="Eir_Code" required>
                </p>
                <p>Password:
                    <input type="password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{10,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 10 or more characters"
                        required>
                </p>
                <p>phone number:
                    <input type="tel" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                </p>
                <p><input type="submit" value="Add New" name="button" /></p>
                <a href="index.php">Return to Login</a>

            </form>
        </div>

        <?php
        require_once "Database.php";
        if (isset($_POST['First_Name']) && isset($_POST['Surname']) && isset($_POST['Date_of_birth']) && isset($_POST['Email'])&& isset($_POST['Eir_Code']) && isset($_POST['Password']) && isset($_POST['phone'])) 
        {
            $UN1 = $_POST['Username'];
            $F1 = $_POST['First_Name'];
            $S1 = $_POST['Surname'];
            $D1 = $_POST['Date_of_birth'];
            $E1 = $_POST['Email'];
            $Eir1 = $_POST['Eir_Code'];
            $P1 = $_POST['Password'];
            $Phon = $_POST['phone'];

            $sql = "INSERT INTO users (Username, First_Name, Surname, Date_of_birth, Email, Eir_Code, Password, phone_number) VALUES ('$UN1','$F1', '$S1', '$D1', '$E1', '$Eir1', '$P1','$Phon')";
            if ($conn->query($sql) === TRUE) 
            {

                header("index.php");

            } else 
            {

                echo "Error: " . $sql . "<br>" . $conn->error;
            }


        $conn->close();
        }

    ?>



    </main>

    <div id="page-container">
        <div id="content-wrap">
            <!-- all other page content -->
        </div>
        <footer id="footer">Copyright. 2022 All rights reserved.</footer>
    </div>


</body>


</html>