
<?php

	// Here there're included the available sharing actions (so far: Facebook, Titter, and comments on Disqus)
	function share($shareTitle, $postUrl) {
		$postUrl = "http://www.nestoralvaro.com/Projects/custom_blog/" . $postUrl;
		// Share on facebook
    	$share = '<img class="shareImg" src="facebook.png" alt="Compartir en Facebook" onclick="shareOnFacebook(\''. $shareTitle . '\' , \''. $postUrl .'\')" />';
    	// Share on twitter
    	$share .= '<img class="shareImg" src="twitter.png" alt="Compartir en Twitter" onclick="shareOnTwitter(\''. $shareTitle . '\' , \''. $postUrl .'\')" />';
    	// Add comments
    	$share .= '<a href="'. $postUrl .'#disqusSection" title="Comentar la entrada" target="_blank"><img class="shareImg" src="comments.png" alt="Comentar la entrada" /></a>';
    	// Add here any other link to share the post
    	// ...
    	// Then return the result
    	return $share;
    }    
?>

