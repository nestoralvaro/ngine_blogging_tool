<?php
include("simplehtmldom_1_5/simple_html_dom.php");
include("share.php");
// Create DOM from URL
$html = file_get_html('all.php');

$allPosts = $html->find('.post');
$fullLength = sizeof($allPosts);
$requestedPost = $_GET["postId"];
// Loop through all posts
foreach($allPosts as $article) {
	// Just get "$requestedPost" post
	if ($fullLength == $requestedPost) {
		$title = trim($article->find('.title', 0)->plaintext);
		$shareTitle = "[Japón] " . $title;
		$postUrl =  "showPost.php?postId=". $requestedPost;
		// Show social
		$sharePart = $article->find('.share', 0) -> innertext = share($shareTitle, $postUrl);
		echo $article;
	}
	$fullLength--;
}
?>
