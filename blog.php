<?php
require 'header.php';
?>

<div class="event-bg">
    <h1 class="center page-title">Blog</h1>
</div>

<div class="container content">
	<?php
	    
	    
	   
	    $tumblr = json_decode(file_get_contents('http://api.tumblr.com/v2/blog/ecssusask.tumblr.com/posts/text?api_key=oEcDGv1Sojr09dHbYJpPQjx5LYz3CHyXkHkBGOWa7Jo7J0PMcb&notes_info=true'), true);
	    //foreach($tumblr['reponse'] as $posts){
	    //	print_r($posts);
	    //}
	    foreach($tumblr['response']['posts'] as $posts){
		$title = $posts['title'];
		$date = $posts['date'];
		$body = $posts['body'];
		$pattern = "/src=[\"']?([^\"']?.*(png|jpg|gif))[\"']?/i";
		$morePics = true;
		$index=0;
	       
		/*===============Block with text wrap=============
		 
		echo "<h2>$title</h2>";
		echo "<p>Date: $date</p>";
		echo "<div class=\"picture\">$body</div>";
		
		===============End of Block with text wrap=============*/
		
		
		/*============Block of ripping the src link from the body text====
		echo "<h2>$title</h2>";
		echo "<p>Date: $date</p>";
		preg_match_all($pattern, $body, $images);
		
		echo "<div class=\"picture\">";
		while($morePics){
		    
		    if(isset($images[0][$index]))
		    {
			echo "<img ".$images[0][$index]."/>";
			$index++;
		    }
		    else{
			$morePics = false;
		    }
		    
		}
		echo "</div>";
		============End of Block of ripping the src link from the body text====*/
		

		
		//$body = preg_replace("/<img[^>]+\>/i", "<div class=\"picture\"><img", $body);
		//$body = preg_replace("<img", "<div class=\"picture\"><img", $body);
		echo "<div class=\"row\">";
		    echo "<div class=\"col-md-12\">";
			echo str_replace("<img", "<div class=\"picture\"><img", $body);
		    echo "</div>";
		echo "</div>";
	    }
		
	    
	?>

</div>
	

<?php
require 'footer.php';
?>