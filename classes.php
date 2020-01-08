<!DOCTYPE html>
<html>
<head>
        <title> class list </title>
        <meta charset="UTF-8">
        <meta name="author" content="Brendan Aucoin">
        <link rel="stylesheet" href="classes_style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script type="text/javascript" src="classes.js"></script>
		<link rel="stylesheet" href="home_styles.css">

</head>

<body>

        <?php
                $icons = array(
                  array("barbarian","bard","cleric","druid","fighter","warlock"),
                  array("monk","paladin","ranger","rogue","sorcerer","wizard"),
                );
				include 'menu_bar.php';
				echo '<div class = "icons">';
				for($row = 0; $row < sizeof($icons); $row++){
					for($col = 0; $col < sizeof($icons[$row]); $col++){
						echo "<span style = 'color:white;'>" . ucwords($icons[$row][$col]) . "</span>";
						echo '<img onclick = "clickedImage(this);" class = "icon" src="res/icons/' . $icons[$row][$col] . '_icon.png" alt="error" width = "100" height = "100" id = "' . $icons[$row][$col] . '"' . '>';
					}
					echo "<br>";
				}
				
				echo "<br>";
				echo "</div>";
				echo '<div id = "right" >';
				echo "</div>";
        ?>

</body>


</html>
