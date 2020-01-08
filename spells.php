<!DOCTYPE html>
<html lang="en">
<head>
        <title>Spell List</title>
        <meta charset="UTF-8">
        <meta name="author" content="Brendan Aucoin & Sasha White">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
        #myBtn {
                display: none;
                position: fixed;
                bottom: 20px;
                left: 5px;
                z-index: 99;
                font-size: 18px;
                border: none;
                outline: none;
                background-color: grey;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 4px;
        }
        </style>
</head>

<body>
<!-- MENU BAR -->
<?php include 'menu_bar.php';?>
 
<div class="container-fluid">
        <div class="row">
                <!-- Left side of page -->
                <div class="col-sm-1" style = "background-color:#1b6e76">
                        <button onclick="topFunction()" id="myBtn" title="Go to top">Back to Top</button>
                        <br>
						<!-- 
						The left sie of the page is a thinner column that consists of multiple divs that sort the spells by whichever class
						uses them. Clicking on the div will trigger an onclick event that will call a Javascript method called filterSelection()
						with a parameter based on which button you clicked. Check the bottom of the page for the script that holds the method.
						The buttons will also change color based on which one you hover over.
						-->
                        <div class= "icon" onclick="filterSelection('all')">
                                <img src="all_icon.png" alt="No Hover All" style = "width: 100%; border-radius: 50%;">
                                <img src="all_icon2.png" alt="Hover All" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>All Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('bard')">
                                <img src="bard_icon.png" alt="No Hover Bard" style = "width: 100%; border-radius: 50%;">
                                <img src="bard_icon2.png" alt="Hover Bard" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Bard Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('cleric')">
                                <img src="cleric_icon.png" alt="No Hover Cleric" style = "width: 100%; border-radius: 50%;">
                                <img src="cleric_icon2.png" alt="Hover Cleric" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Cleric Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('druid')">
                                <img src="druid_icon.png" alt="No Hover Druid" style = "width: 100%; border-radius: 50%;">
                                <img src="druid_icon2.png" alt="Hover Druid" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Druid Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('paladin')">
                                <img src="paladin_icon.png" alt="No Hover Paladin" style = "width: 100%; border-radius: 50%;">
                                <img src="paladin_icon2.png" alt="Hover Paladin" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Paladin Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('ranger')">
                                <img src="ranger_icon.png" alt="No Hover Ranger" style = "width: 100%; border-radius: 50%;">
                                <img src="ranger_icon2.png" alt="Hover Ranger" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Ranger Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('sorcerer')">
                                <img src="sorcerer_icon.png" alt="No Hover Sorcerer" style = "width: 100%; border-radius: 50%;">
                                <img src="sorcerer_icon2.png" alt="Hover Sorcerer" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Sorcerer Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('warlock')">
                                <img src="warlock_icon.png" alt="No Hover Warlock" style = "width: 100%; border-radius: 50%;">
                                <img src="warlock_icon2.png" alt="Hover Warlock" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Warlock Spells</b></p>
                        </div>
                        <div class= "icon" onclick="filterSelection('wizard')">
                                <img src="wizard_icon.png" alt="No Hover Wizard" style = "width: 100%; border-radius: 50%;">
                                <img src="wizard_icon2.png" alt="Hover Wizard" class="img-top"  style = "width: 100%; border-radius: 50%;">
                                <p class = "icon"><b>Wizard Spells</b></p>
                        </div>
                </div>

		
		
			<!-- Right side of page -->
			<div class="col-sm-11" style = "background-color: beige;">
				<!-- Cantrips -->
				<br>
				<h2>All Spells</h2>
				<br>
				<h3>Cantrips:</h3>
				<!-- Spell List Starts -->	

				<?php
				
				//This code puts each line of their respective files into an array of appropriate name.
				//Filters
				$filtersArray = file("./spells/filters.txt", FILE_IGNORE_NEW_LINES);
				//Spell Name
				$nameArray = file("./spells/name.txt", FILE_IGNORE_NEW_LINES);
				//Casting Time
				$timeArray = file("./spells/time.txt", FILE_IGNORE_NEW_LINES);
				//Range
				$rangeArray = file("./spells/range.txt", FILE_IGNORE_NEW_LINES);
				//Components
				$componentsArray = file("./spells/components.txt", FILE_IGNORE_NEW_LINES);
				//Duration
				$durationArray = file("./spells/duration.txt", FILE_IGNORE_NEW_LINES);
				//School
				$schoolArray = file("./spells/school.txt", FILE_IGNORE_NEW_LINES);
				//Classes
				$classesArray = file("./spells/classes.txt", FILE_IGNORE_NEW_LINES);
				//Description
				$descArray = file("./spells/desc.txt", FILE_IGNORE_NEW_LINES);

				
				
				//Loop goes through all of the files getting the information from each line of the files.
				for ($x = 0; $x < count($nameArray); $x++)
				{
					//The spells are sorted into levels and then alphabetically. When we get to certain points, (i.e. 24 lines)
					//we are finished with a certain level of spells which is when we put a new label in (i.e. Level 1 Spells)
					if ($x == 24)
					{
						echo '<br><h3>Level 1 Spells:</h3>';
					}
					if ($x == 73)
					{
						echo '<br><h3>Level 2 Spells:</h3>';
					}
					if ($x == 127)
					{
						echo '<br><h3>Level 3 Spells:</h3>';
					}	
					if ($x == 169)
					{
						echo '<br><h3>Level 4 Spells:</h3>';
					}
					if ($x == 200)
					{
						echo '<br><h3>Level 5 Spells:</h3>';
					}
					/* 
					   This code is a template for a dropdown box of each spell. This code is looped for each spell in the database.
					   The variables dictate what exists in the information boxes and also dictates when this spell shows up depending
					   the filter chosen by the user 
					*/
					echo '<div class = "filterDiv ' . $filtersArray[$x] . '">';
						echo '<button class="collapsible"><b>' . $nameArray[$x] . '</b></button>';
						echo '<div class="content">';
							echo '<table style="width:100%">';
								echo '<tr>';
									echo '<td>';
										echo '<p><b>Casting Time</b><br>' . $timeArray[$x] . '</p>';
									echo '</td>';
									echo '<td>';
										echo '<p><b>Range</b><br>' . $rangeArray[$x] . '</p>';
									echo '</td>';
									echo '<td>';
										echo '<p><b>Components</b><br>' . $componentsArray[$x] . '</p>';
									echo '</td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>';
										echo '<p><b>Duration</b><br>' . $durationArray[$x] . '</p>';
									echo '</td>';
									echo '<td>';
										echo '<p><b>School</b><br>' . $schoolArray[$x] . '</p>';
									echo '</td>';
									echo '<td>';
										echo '<p><b>Classes</b><br>' . $classesArray[$x] . '</p>';
									echo '</td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td colspan = "3">';
										echo '<p>';
										echo '<br>';
										echo $descArray[$x];
										echo '</p>';
									echo '</td>';
								echo '</tr>';
							echo '</table>';	
						echo '</div>';
					echo '</div>';	
				}


				
				?>
				<br><br><br>
			</div>
		</div>
</div>


<!-- Script for Dropdown boxes -->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>


<!-- Script for Sorting -->
<script>
//Default sort is all meaning all spells are shown
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}
</script>


<!-- Script for scroll to top button-->
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 700px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>
</html>