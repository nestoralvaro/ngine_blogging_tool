
<?php
include_once("simplehtmldom_1_5/simple_html_dom.php");

// Checks if a concrete label is already on the label list
function findLabel($label, $labelsList) {
	foreach($labelsList as $key => $value){
		$key = ltrim(rtrim($key));
		$label = ltrim(rtrim($label));
    	if($key == $label){
	    	return true;
        }
    }
    return false;
}

// Shows all labels
function showAllLabels() {
	// Create DOM from URL
	$html = file_get_html('all.php');
	$allPosts = $html->find('.post');
	$labelsList = array();
	// Go through all posts
	foreach($allPosts as $article) {
		// These 2 variables are used on both cases
		$labels = trim($article->find('.labels', 0)->plaintext);
		// transform in lowercase
		$labels = strtolower($labels);
		// split labels (in case there're more than one they're comma separated)
		$labels = explode(",",$labels);
		// Iterate over the labels
		foreach($labels as $label) {
			$label = trim($label);
			// Check if the label exists and then add one to that value
			if (findLabel($label, $labelsList)) {
				$labelsList[$label]= $labelsList[$label] + 1;
			// Otherwise add it to the array	
			} else {
				$labelsList[$label] = 1;
			}
		}
	}
	$keys = array_keys($labelsList);
	sort($keys);
	$labelsToShow;
	$endString = "  -  ";
	$endStringLen = strlen($endString);
	foreach($keys as $key) {
		$labelsToShow .= "<a href='./showLabel.php?label=" . $key . "' target='_blank'>";	
		$labelsToShow .= $key;
		// This is to show the number of posts with each label
		$labelsToShow .= " (". $labelsList[$key] . ")";
		$labelsToShow .= "</a>";
		$labelsToShow .=  $endString;
	}
	$labelsToShow = substr($labelsToShow, 0, ($endStringLen * -1));
	return $labelsToShow;
}
?>