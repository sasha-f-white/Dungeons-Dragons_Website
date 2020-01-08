<!DOCTYPE html>
<html>
<head>

        <title> Sign out </title>
        <meta charset="UTF-8">
        <meta name="author" content="Brendan Aucoin">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
        <?php
                session_start();
                if(isset($_SESSION["username"])){
                        unset ($_SESSION["username"]);

                }
                echo "<span> Successfully signed out</span>";
                echo "<br/>Will redirect in 1 second";
                header( "refresh:1;url=http://webdev.scs.ryerson.ca/~baucoin/DnD_website/home.php" );
        ?>
</body>

</html>
