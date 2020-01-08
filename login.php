<!DOCTYPE html>
<html>
<head>
        <title> login </title>
        <meta charset="UTF-8">
        <meta name="author" content="Brendan Aucoin">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <?php
		//did not want to put actual mysql login here
         $SqlserverName = "localhost";
         $Sqlusername = "test";
         $Sqlpassword = "test";
         $SqldatabaseName = "test";


          $conn = mysqli_connect($SqlserverName,$Sqlusername,$Sqlpassword,$SqldatabaseName);//connect to the database
                if($conn->connect_error){
                        die("Connection failed: " . mysqli_connect_error());
                }

		//get the user info they entered from the form
        $userName = $_POST["userName"];
        $password = $_POST["password"];

		//get the username and password from the database
        $sql = "SELECT username, password FROM DnD_users";
        $result = $conn->query($sql);
        $goToPreviousPage = FALSE;
		//if there is more than one entry
        if($result->num_rows >0){
			while($row = $result->fetch_assoc()){
						//if the username and password the user entered matches a username and password combonation in the database
                        if($userName == $row["username"] and $password == $row["password"]){
                                echo "logged in<br/>";
                                $goBackToPreviousPage = FALSE;
                                break;
                        }
                        else{
                                $goBackToPreviousPage = TRUE;
                        }
                }
        }
		//if the login was unsuccesful
        if($goBackToPreviousPage == TRUE){
                incorrectLogin();
                echo "Will redirect in 1 second";
                header( "refresh:1;url=http://webdev.scs.ryerson.ca/~baucoin/DnD_website/login_page.html" );
        }
        //correct login
        else{
                createSession($userName);
                echo "Will redirect in 1 second";
                header("refresh:1;url=http://webdev.scs.ryerson.ca/~baucoin/DnD_website/home.php");

        }
		//this function just alerts the user that they entered their username or password wrong
        function incorrectLogin(){
                echo '<script type="text/javascript">';
                echo 'alert("Incorrect login")';
                echo '</script>';
        }
		//creates a session which is used to verify that the user is logged in. could also be a cookie in certain instances.
        function createSession($userName){
                session_start();
                $_SESSION["username"] = $userName;
        }

  ?>
</body>

</html>
                                        