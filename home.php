<!DOCTYPE html>
<html>
<head>
        <title> Home </title>
        <meta charset="UTF-8">
        <meta name="author" content="Brendan Aucoin & Sasha White">
        <link rel="stylesheet" href="home_styles.css">
        <link rel="stylesheet" href="slideshow_style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body style="background-color:grey;">
		<!-- include the menu bar at the top of the page-->
        <?php include 'menu_bar.php';?>
		
        <div style = "width:100%;"class="container">
                <div class="mySlides">
                        <div class="numbertext"></div>
                        <img src="res/images/dndImage1.png" style="width:100%">
                </div>

        <div class="mySlides">
                <div class="numbertext"></div>
                <img src="res/images/dndImage2.png" style="width:100%">
        </div>

        <div class="mySlides">
                <div class="numbertext"></div>
                <img src="res/images/dndImage3.png" style="width:100%">
        </div>

		
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>


                <div class="row">
                        <div class="column">
                                <img class="demo cursor" src="img_woods.jpg" style="width:100%" onclick="currentSlide(1)" alt="">
                        </div>
                        <div class="column">
                                <img class="demo cursor" src="img_5terre.jpg" style="width:100%" onclick="currentSlide(2)" alt="">
                        </div>
   <div class="column">
                                <img class="demo cursor" src="img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="">
                        </div>
                </div>
        </div>

        <script>
                let slideIndex = 1;
                showSlides(slideIndex);
				/*increment the slide number*/
                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }
				/*show the current slide image you are on*/
                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }
				/*show a specific slide based on an index*/
                function showSlides(n) {
                  let i;
                  let slides = document.getElementsByClassName("mySlides");
                  let dots = document.getElementsByClassName("demo");
                  let captionText = document.getElementById("caption");
                  if (n > slides.length) {slideIndex = 1}
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                          slides[i].style.display = "none";
                  }
                  for (i = 0; i < dots.length; i++) {
                          dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block";
                  dots[slideIndex-1].className += " active";
                  captionText.innerHTML = dots[slideIndex-1].alt;
                }
        </script>
</body>

</html>
