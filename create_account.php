<html>
<head>
<meta charset="UTF-8">
        <title> Account Created </title>
        <meta name="author" content="Brendan Aucoin">
        <link rel="stylesheet" href="home_styles.css">
        <link rel="stylesheet" href="slideshow_style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
        <?php
				//didnt want to put actual database login
                $SqlserverName = "localhost";
                $Sqlusername = "test";
                $Sqlpassword = "test";
                $SqldatabaseName = "test";
				
				//get all the information from the form
                $userName = $_POST["userName"];
                $email = $_POST["email"];
                $password = $_POST["password"];

				//connect to mysql with the variables that have been set up
                $conn = mysqli_connect($SqlserverName,$Sqlusername,$Sqlpassword,$SqldatabaseName);
                if($conn->connect_error){
                        die("Connection failed: " . mysqli_connect_error());//if the login was wrong exit
                }


                $sql = "SELECT id, username, email, password FROM DnD_users";//get the username email and password from the database
                $result = $conn->query($sql);
                $createAccount = TRUE;
                if($result->num_rows >0){//if the database is not empty
                        while($row = $result->fetch_assoc()){//get each entry

                                if($userName == $row["username"]){//if the username the user entered already existed in the database then that acccount is taken
                                        $createAccount = FALSE;
                                        break;
                                }
                        }
                }
			if($createAccount == TRUE){
				$sql = "INSERT INTO DnD_users (username, email, password)
				VALUES ('$userName','$email','$password')";//insert the data the user entered into the form into the database
				if($conn->query($sql) == TRUE){
					echo "Your account has successfully been created";
				}
				else{
					echo "Error: " . $sql . "<br/>" . $conn->error;
				}
            }
			
			else{
				echo "That user name is already taken";
			}
			
			echo "<br/><p id = 'demo'> </p>";
			$conn->close();//close the database connection
			if($createAccount == FALSE){header('Refresh: 1; URL=http://webdev.scs.ryerson.ca/~baucoin/DnD_website/sign_up.html'); }//if the account name was taken then redirect back to the sign up page
			else{header('Refresh: 1; URL = http://webdev.scs.ryerson.ca/~baucoin/DnD_website/login_page.html');}//if they created a new account then go back to the home page
			echo "Will redirect in 1 second<br/>";
			echo "<div style = 'display:flex;'>";
			echo "<br/> <a style = 'margin-right: 2em;'href = 'https://www.google.com/'> Home </a>";
			echo "<a href = 'https://www.scs.ryerson.ca/~cps530/labs/manual.html'> Sign up </a>";
			echo "</div>";
        ?>

</body>
</html>
