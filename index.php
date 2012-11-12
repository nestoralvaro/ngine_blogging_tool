
<?php
include("top.php");
include_once("simplehtmldom_1_5/simple_html_dom.php");
include("instagram.php");
include("share.php");
// Create DOM from URL
$html = file_get_html('all.php');

$allPosts = $html->find('.post');
$fullLength = sizeof($allPosts);
$remainingPosts = $fullLength;
$postsToShow = 3;
$oldPosts = "<div class='post old'><p style='font-weight:bold'> Pincha en los siguientes enlaces para ver los artículos anteriores</p>";
// Find all posts
foreach($allPosts as $article) {
	// These 2 variables are used on both cases
	$title = trim($article->find('.title', 0)->plaintext);
	$shareTitle = "[Japón] " . $title;
	$postUrl =  "showPost.php?postId=". $remainingPosts;
	// Just show the newest posts ("$postsToShow" number of posts)
	if ($remainingPosts + $postsToShow > $fullLength) {
		// Fill "share" div
		$sharePart = $article->find('.share', 0) -> innertext = share($shareTitle, $postUrl);
		echo $article;
	} else {
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

echo "<br />";
echo "<p style='font-weight:bold'> <br /> Si quieres ver TODOS los artículos de una vez (es una locura porque va a tardar la vida en cargar, pero bueno. Allá tu) <a href='all.php' target='_blank'> Pincha en este enlace</a></p>";
echo "<br />";

echo $oldPosts;


include("bottom.php");
?>

