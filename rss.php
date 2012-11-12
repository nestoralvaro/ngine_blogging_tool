<?php
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="utf-8" ?>';

include("simplehtmldom_1_5/simple_html_dom.php");
// Create DOM from URL
$html = file_get_html('all.php');

$allPosts = $html->find('.post');
$fullLength = sizeof($allPosts);
$remainingPosts = $fullLength;
$postsToShow = 3;
$allItems = "";
$itemStart = '<item>';
$itemEnd = "</item>";
// Find all posts
foreach($allPosts as $article) {
	// Just show the newest posts ("$postsToShow" number of posts)
	if ($remainingPosts + $postsToShow > $fullLength) {
		// echo $article;
		$title = trim($article->find('.title', 0)->plaintext);
		$time_day = $article->find('.time-day', 0)->plaintext;
	    $time_month = $article->find('.time-month', 0)->plaintext;
    	$time_year = $article->find('.time-year', 0)->plaintext;
    	$postUrl =  "showPost.php?postId=". $remainingPosts;
    	$entry = $article->find('.entry', 0);
    	$postDate = $time_year ."-". $time_month ."-". $time_day;
		// FEED
		$allItems .= $itemStart;
        $allItems .= "<title>". $title ."</title>";
        $allItems .= "<link>". $postUrl ."</link>";
        // Fixes the problem. Images have now a better size :-)
        $fixedImgEntry = str_replace("<img src=", "<img width='300px' src=", $entry);
        $allItems .= "<description>". '<![CDATA[' . $fixedImgEntry . ']]>' ."</description>";
        $allItems .= "<guid>". $postUrl ."</guid>";
		$correctDate = new DateTime($postDate);
        $allItems .= "<pubDate>". date_format($correctDate, 'D, d M y H:i:s O') ."</pubDate>";
		$allItems .= $itemEnd;
	} else {
		break;
	}
	$remainingPosts--;
}
?>
<rss version="2.0">
	<channel>
    	<title>REPLACE WITH CUSTOM TITLE</title>
	    <link>/</link>
    	<description>REPLACE WITH CUSTOM DESCRIPTION</description>
<?php
	echo $allItems;
?>
	</channel>
</rss>