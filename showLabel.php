
<?php
include("top.php");
include_once("simplehtmldom_1_5/simple_html_dom.php");
include("instagram.php");
include("share.php");

function findLabel($requestedLabel, $labels) {
	foreach($labels as $key => $value){
		$value = ltrim(rtrim($value));
		$requestedLabel = ltrim(rtrim($requestedLabel));
		// echo $value . " == " . $requestedLabel . " ??";
    	if($requestedLabel == strtolower($value)){
	    	return true;
        }
    }
    return false;
}

// Create DOM from URL
$html = file_get_html('all.php');

$allPosts = $html->find('.post');
$fullLength = sizeof($allPosts);
$remainingPosts = $fullLength;
$requestedLabel = $_GET["label"];
$oldPosts = "<div class='post old'><p> Estos son los posts con la etiqueta \"<span class='labelName'>" .  $requestedLabel . "</span>\"</p>";
// Find all posts
foreach($allPosts as $article) {
	// Get labels
	$labels = trim($article->find('.labels', 0)->plaintext);
	// transform in lowercase
	$labels = strtolower($labels);
	// split labels (in case there're more than one they're comma separated)
	$labels = explode(",",$labels);
	// FIRST OF ALL CHECK IF THE LABEL MATCHES
	if (findLabel($requestedLabel, $labels)) {
		// These 2 variables are used on both cases
		$title = trim($article->find('.title', 0)->plaintext);
		$shareTitle = "[Japón] " . $title;
		$postUrl =  "http://www.nestoralvaro.com/japon/showPost.php?postId=". $remainingPosts;
    	$time_day = $article->find('.time-day', 0)->plaintext;
		$time_month = $article->find('.time-month', 0)->plaintext;
	    $time_year = $article->find('.time-year', 0)->plaintext;
    	$oldPosts .= "<div class='oldPost'>";
		$oldPosts .= "<a href='". $postUrl ."' target='_blank' >";
		$oldPosts .= "[". $time_year ."-". $time_month ."-". $time_day ."]";
    	$oldPosts .= "<span class='oldTitle'>". $title . "</span>";
    	$oldPosts .= "</a>";    	
		// invoke "share" function to show all places to share
		$oldPosts .= share($shareTitle, $postUrl);
    	$oldPosts .= "</div>";
	}
	$remainingPosts--;
}
$oldPosts .= "</div><!-- \olderPosts -->";
?>
        
<?php

echo $oldPosts;


include("bottom.php");
?>

