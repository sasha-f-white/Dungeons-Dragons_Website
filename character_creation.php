<!DOCTYPE html>
<html>
        <head>
                <title> Character Creation </title>
                <meta charset="UTF-8">
                <meta name="author" content="Brendan Aucoin & Sasha White">
                <link rel="stylesheet" href="character_creation_styles.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        </head>

        <body>
			<?php
				//if you are not logged in then redirect to the login page
				session_start();
                if(!isset($_SESSION["username"])){
					header('Location: http://webdev.scs.ryerson.ca/~baucoin/DnD_website/login_page.html');
				}
            ?>
			<!-- have the menu bar at the top of the page-->
           <?php include 'menu_bar.php';?>
           <?php  $stats = array("strength","dexterity","constitution","intelligence","wisdom","charisma"); ?>


			<div id = "container" class = "container-fluid row">
				<div style = "background-color:#E5E7E9" class = "col-sm-3" id = "coreStats">
					<?php
						//display 6 of the same boxes but with differnt text based the content of the array
						for($i =0;$i < sizeof($stats); $i++){
							echo '<div style = "background-color:white;" class = "core_stats" id ="core_stats_' . $stats[$i] . '">';
								echo '<h2>' . ucfirst($stats[$i]) . '</h2>';
								echo "<br/>";//once you click off the text field then calculate what the modifyer is
								echo '<input onchange = displayModifyer(this) type = "text" class = "onlyNumbers straightLine" id ="core_stats_' . $stats[$i] .  '_text"/>';
								echo "<br/><br/>";
								echo '<div class = "middleNumber">';
									echo '<p  class = "middleNumber" id = "core_stats_' .  $stats[$i] . '_number"> 0  </p>';
								echo '</div>';
							echo "</div>";
							}
					?>
			</div>
			
			<div class = "outerDiv col-sm-3" id = "skills">
			<h2> Character Name </h2>
			<input id = "character_name" type = "text" class = "name">  </input>
			<br/><br/><br/>
			<?php
			/*this function is used for creating a box of multiple skills based on an array you pass in*/
			function createBox($label,$array,$header){
				echo '<div style = "background-color:#E5E7E9 " class = "' . $label . '" id = "' . $label . '">';
				echo "<br/>";
				for($i = 0; $i < sizeof($array); $i++){
					echo '<div id = "' . $label . '_' . $array[$i] . '">';
					echo '<input type = "checkbox" />';
					echo '<input type = "text" class = "onlyNumbers  straightLine ' . $label . '"  size = 1 id = "' . $label  .  "_" . $array[$i] . "_text" .'" />';
					echo '<span class = "' . $label . '">' . ucfirst($array[$i])  . '</span>';
					echo '</div>';
					echo '<br/>';
					}
					echo '<h4 style = "text-align:center;">' . $header . '</h4>';
					echo '</div>';
				}
				createBox("savingThrows",$stats,"Saving Throws");//calling the function multiple times for different arrays
				echo "<br/>";
				$skills = array("acrobatics","animal handling","arcana","atheltics","deception","history","insight","intimidation","investigation","medicine","nature","perception","performance","persuasion", "religion","sleight of hand", "stealth", "survival");
				createBox("skills",$skills,"Skills");
				?>
				</div>
				
				<div class = "outerDiv col-sm-5" id = "equipment_spells">
					<br/><br/>
					<h2> Spells & Equipment </h2>
					<br/><br/><br/>
					<div class = "attack_spells">
						<?php
							/*create a table using php so its less repetitive code*/
							echo '<table style = "width:100%" id = "attacks_spells_table">';
							echo '<tr>';
							echo '<th class = "padd"> Name </th>';
							echo '<th class = "padd"> ATK Bonus </th>';
							echo '<th class = "padd"> Damage/type </th>';
							echo '</tr>';
							for($row =0; $row < 3; $row++){
								echo '<tr>';
								for($col = 0; $col < 3; $col++){
									$onlyNumbers = "";
									if($col === 1 || $col === 3){$onlyNumbers = "onlyNumbers";}
									echo '<td class = "padd"><input id = "row:' . $row . ' col:' . $col . '" size = 7 type = "text" class = "' . $onlyNumbers . '" /></td>';
								}
								echo '</tr>';
							}
							echo '</table>';
						?>
					</div>
					<br/>
					<div>
						<h2 style = "text-align:center;"> Attacks and Spellcasts</h2>
						<textarea id = "attacks_and_spellcasts" rows="10" cols="60" class = "paper" > </textarea>
					</div>
					<br/>
					<div>
						<h2 style = "text-align:center;"> Equipment</h2>
						<textarea id = "equipment" rows="10" cols="60" class = "paper" > </textarea>
					</div>
				</div>
			</div>
			<script>
				/*make if so taht if you try and type a letter where on certain text fields then they wont appear becuase only numbers are accepted*/
				$(document).ready(function(){
					$("input[type=text].onlyNumbers").keypress(function(e){
						let key = e.which;
						if(!((key > 47 && key < 58) || (key == 43) || (key == 45))){//if the keys are not numbers
							e.preventDefault();//the default would be the key press
						}
					});
				});
				
				function displayModifyer(elem){
					let numberId = elem.id.replace("text","number");//this is to get the element underneath the text field that is specifically for the number
					if(elem.value === ""){
						document.getElementById(numberId).innerHTML = "0";
						return;
					}
					let modifyerNum = parseInt((elem.value - 10)/2);//calculating the modifyer
					let modifyerStr = modifyerNum > 0 ? "+" + modifyerNum : modifyerNum;//appending the modifyer to a string to set as the inner code
					document.getElementById(numberId).innerHTML = modifyerStr;
				}
			</script>
        </body>

</html>

