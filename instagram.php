
<?php
include_once("simplehtmldom_1_5/simple_html_dom.php");
// Create DOM from URL
$html = file_get_html('http://statigr.am/nestoralvaro');

$allPictures = $html->find('.detailPhotoGrid');
$fullLength = sizeof($allPictures);
$remainingPosts = $fullLength;

$picturesToShow = 5;

$instagramPictures = "";
$instagramPictures = "<div id='instagramPictures'>";
$instagramPictures .="<br /><br />";
$instagramPictures .="<div id='allPictures'>";
// Find all posts
foreach($allPictures as $picture) {
	// Just show the newest posts ("$picturesToShow" number of posts)
	if ($remainingPosts + $picturesToShow > $fullLength) {
		$instagramPictures .="<div class='instaPicture'>";
		// This adds a class to the picture
		$mypic = $picture->find('img',0);
		$mypic->class = 'instaImg';
		$mypic->alt = 'instagram picture';
		$image = trim($mypic);
//		Originally it was like this (not adding a class):
//		$image = trim($picture->find('img',0));
		$pictureLink = trim($picture->find('a', 0)->href);
		$instagramPictures .= "<a href='http://statigr.am/" . $pictureLink . "' target='_blank'>" . $image . "</a>";
		$instagramPictures .="</div><!-- \instaPicture -->";
	}
	$remainingPosts--;
}
$instagramPictures .="</div><!-- \allPictures -->";
$instagramPictures .= "</div><!-- \instagramPictures -->";
echo $instagramPictures;
?>
