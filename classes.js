/*this function reads the conent of a file from a specified path and puts a heading above wherever you display the files content*/
function readFile(path,heading){
        let allText = "";
        let txtFile = new XMLHttpRequest();//the text file your working with
		txtFile.open("GET", path, true);//open the file with the specified path
		txtFile.onreadystatechange = function() {
		if (txtFile.readyState === 4) {  // Makes sure the document is ready to parse.
			if (txtFile.status === 200) {  // Makes sure it's found the file.
				allText = txtFile.responseText;
				appendHTML(heading);//append the heading to the page
				appendHTML("<p>" + allText + "</p>");//display the text from the file on the page
				appendHTML("<hr><br/>");
			}
		}
	}
txtFile.send(null);//close the file
}
/*appends whatever HTML code you pass in through the parameter*/
function appendHTML(code){
        let inner = document.getElementById("right").innerHTML;
        document.getElementById("right").innerHTML = inner + code;
}
/*a function that is called when you click on one of the images it displays the text from the proper file based on the image you click*/
function clickedImage(elem){
        document.getElementById("right").innerHTML = "";
        let backgroundImg = "url(<img src = 'res/icons/" + elem.id +"_icon.png' alt = 'icon' width = 500 height = 500>)";
        appendHTML("<h1 style = 'font-size:4em;'> " + elem.id.charAt(0).toUpperCase() + elem.id.slice(1) + "</h1><br>");//append the name of the id to the apge as a heading
        let generalPath = "class_info/" + elem.id  +"_general.txt";//the first text file path
        readFile(generalPath,"<h3> General Information </h3><hr/>");//call the realFile function with that path that was created
        let imgSrc = "res/images/" + elem.id + ".png";//the image that is put on the right side of the page
        appendHTML("<img style = 'margin-top: -2em;float:right;' src = '" + imgSrc +"' alt = 'img'>");
        let tipsPath = "class_info/" + elem.id + "_tips.txt";//reading the second file.
        readFile(tipsPath,"<h3> Tips for Creation </h3><hr/>");
}
