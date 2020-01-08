<head>
        <link rel="stylesheet" href="menu_bar_styles.css">
</head>
<?php
        session_start();

        $username = "";
		//if the username session is set (if the user logged in) then set a variable to their ame
        if(isset($_SESSION["username"])){
                $username = "Logged in as: " . $_SESSION["username"];
        }
        echo '<div class = "menu_bar">';
                echo '  <img class = "logo" src = "res/images/doggles.png" alt = "logo" width = 64 height = 64>';//display a temp logo since we are not an actual company we just used a dog picture
				//all the links to our other pages
                echo '<a class = "cool-link menu_bar" href = "http://webdev.scs.ryerson.ca/~baucoin/DnD_website/home.php"> Home </a>';
                echo '<a class = "menu_bar" href = "http://webdev.scs.ryerson.ca/~baucoin/DnD_website/classes.php"> Classes </a>';
                echo ' <a class = "menu_bar" href = "http://webdev.scs.ryerson.ca/~sfwhite/DnD_website/spells.php"> Spells </a>';
                echo ' <a class = "menu_bar" href = "http://webdev.scs.ryerson.ca/~baucoin/DnD_website/character_creation.php"> Character Creation </a>';

                echo '</div>';
				//the login button on the right side of the page
                echo '<div class = "menu_bar_right">';
                        echo '<span class = "username" style = "color: white;">' . $username . ' </span>';//display the username which will be blank if they are not logged in
                        echo '<span class="dropdown">';
                        echo ' <button class="dropdown_button">Login</button>';//a dropdown button
                        echo ' <span class="displayed_content">';
                        echo '  <a href="http://webdev.scs.ryerson.ca/~baucoin/DnD_website/login_page.html">Login</a>';
                        echo ' <a href="http://webdev.scs.ryerson.ca/~baucoin/DnD_website/sign_up.html">Sign up</a>';
                        echo '<a href="http://webdev.scs.ryerson.ca/~baucoin/DnD_website/sign_out.php">Sign out</a>';
                        echo ' </span>';

        echo '</div>';
?>
