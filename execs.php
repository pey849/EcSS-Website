<?php
require 'header.php';
?>

<div class="event-bg">
    <h1 class="center page-title">Executives</h1>
</div>

<div class="container content">
    
<?php

//get the url from the publish to web options in drive spreadsheet
//get it as a csv so it can be iterated through
$spreadsheet_url="https://docs.google.com/spreadsheets/d/1alw6qwHKjmvVX29YwQqtGEePsTkVAN5BdGtO14GeIik/export?gid=0&format=csv";
//$spreadsheet_url="https://docs.google.com/spreadsheet/pub?key=0AuwXAOvqaY5PdEFwQmo5SVhBRno0ZWZEQXl6OHRCclE&output=csv";

//$spreadsheet_url="https://docs.google.com/spreadsheet/pub?key=0AoTCgiGbZYB7dFZyY3VRT1c0QTJReThZM0JaSXEyZUE&output=csv";


$index = 0;

//give each Exec block an unique id
$idTag = "";

//everytime this gets opened, it erases all previous entries
$animationSheet = fopen("js/animationSheet.js", "w");
$visibilitySheet = fopen("css/objectVisibility.css", "w");


if(!ini_set('default_socket_timeout',    15)) echo "<!-- unable to change socket timeout -->";

if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) 
{
	//while there is still more csv data
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
    {

        //{} <-- use to convert int to string, ignores the data type and concats the two together
        $idTag = "object{$index}";

        echo "<div class=black-bg id=\"" . $idTag . "\">";
        //ifs are so that there are no broken images or weird formatting from empty cells


        if ($data[2] != "" || $data[2] != null)
        {
            echo "<img class=\"exec-img float-left\" src=" . $data[2] . ">";
        }

        if ($data[0] != "" || $data[0] != null)
        {
        	echo "<h3>" . $data[0] . "</h3>";
    	}
    	if ($data[1] != "" || $data[1] != null)
        {
            echo "<h1>" . $data[1] . "</h1>";
        }
        if ($data[3] != "" || $data[3] != null)
        {
            echo "<p>" . $data[3] . "</p>";
        }

        echo "<div class=clearfix></div>";
        echo "</div>";


	
        if($index > 2){
	    
	    $insertJQuery = "

		$(document).ready(function() {
		     $(window).scroll(function() {
			 $('#object".$index."').each(function(){
			 var imagePos = $(this).offset().top;
     
			 var topOfWindow = $(window).scrollTop();
			     if (imagePos < topOfWindow+400) {
				 $(this).addClass(\"fadeIn\");
			     }
			 });
		     });
		 });
     
	     ";
	
	    $insertCSS = "
	    
		#object".$index."{
		    visibility: hidden;
		}	
		
	    ";



	    fwrite($animationSheet, $insertJQuery);
	    fwrite($visibilitySheet , $insertCSS);
	    
	}
        $index++;
    }
    fclose($handle);
    fclose($animationSheet);
    fclose($visibilitySheet);
}
else
    die("Problem reading csv");
?>

</div>

<?php
require 'footer.php';
?>