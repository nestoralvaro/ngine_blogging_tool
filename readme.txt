
N-gine for blogs. - Easy blog management -

------------------------------------------------------------------------------------------------------------

This project provides a basic structure for blogging as it comes with
	- rss
	- Generates posts with unique link
	- Main page (index.php) with 3 latest posts (this value is configurable) + list of all older posts
	- Support for comments (via DISQUS).
	
However, this project for building blogs DOES NOT provide a BACK_OFFICE TOOL.
This means that all blog post have to be entered directly on "all.php" file following the provided structure.

You can see a live example here: http://www.nestoralvaro.com/Projects/custom_blog/index.php

------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------
Here's the list of files:

- top.php
	Contains the basic information.
	Css files are included here
	Don't forget to replace
		* "description"
		* Main title

- showPost.php
	Prepares a post to be shown, also included disqs comments
	Don't forget to replace
		* "disqus_shortname"

- share.php
	Includes the sharing features that are then shown
	Don't forget to replace 
		* "alt" attribute on the links (these are in Spanish)
		* "title" attribute on the links (these are in Spanish)
		* "$postUrl" to use the absolute url to your entry so that Facebook and Twitter can get it correctly.
	You can also add new social links here.

- rss.php
	Generates the rss file
	Don't forget to replace
		* "<title>REPLACE WITH CUSTOM TITLE</title>" To use your own title
	    * "<link>/</link>" To use your own link (eg: http://mydomain.com/blog)
    	* "<description>REPLACE WITH CUSTOM DESCRIPTION</description>" To use your own description

- instagram.php
	Prepares instagram pictures to show them on the top of the blog. In case you don't have instagram you can remove this, or use any other service to show pictures
	Don't forget to replace
		* "$html = file_get_html('http://statigr.am/nestoralvaro');" use your own "statigram" to fetch the pictures
		
- js/base.js
	Contains the basic javascript file, also the functions to attach events (there's no jQuery here), share on twitter and share on facebook.
	Don't forget to replace
		* "titles" which has an array with the changing titles that will be shown. You can remove this functionality or use some string for the titles on the top of your blog.
		
- getPost.php
	Fetchs a post given it's ID
	Don't forget to replace
	* "currPostShareTitle" to include your custom text when sharing the post (now it says "[Japón] ")
	
- css/styles.css
	Contains the basic styles. There're a few useful classes to rotate divs:
	* rotate90cw -> Rotates a video 90 degrees clockwise
	* rotate90ccw -> Rotates a video 90 degrees counter-clockwise
	* rotate180 -> Rotates a video 180 degrees
	These 3 classes can become quite handy when videos have been taken rotated.
	Don't forget to replace
	* ".labels:before" as this text will be shown before the label on each post (by default it's in Spanish

- css/reset.css
	This file resets all the styles before applying new styles.
	This whole file has been obtained from: http://meyerweb.com/eric/tools/css/reset/

- bottom.php
	 This file includes the footer that will be appended at the end of each page. 
	 "base.js" file is included here
	 Don't forget to replace
	 	* "<footer>" To include your own credits here.

- all.php
	At the begining includes "top.php" (headers and such), and in the end "bottom.php" (creadits and javascript files).
	Between these 2 included files are the posts.
	The structure of the posts is within class "post" and contains:
	+ Title
	+ Time (dd-mm-yyyy)
	+ Entry (here are all the contents: text, images and videos). In the example below the div with class "rotate90cw" is used to rotate the video
	+ Labels
	+ Share (this div is empty and then filled)
	Don't forget to replace
	* the "href" link on "title" div (which has to have the id of the post). Each post will have an id starting the first post with "postId=1", then the next post has to have "postId=2" and so on
	* "img" > "src"
	* "video" > "src"

- index.php
	This file is the main file shown when the page is visited. At the beginning includes all the other important files for presentation ("top.php", "instagram.php" and "share.php") and also "simplehtmldom_1_5/simple_html_dom.php" to parse contents.
	By default only the last 3 posts are shown: "$postsToShow = 3;". The rest of the posts ("$oldPosts") are just shown as a list.
	There's also a bit of css placed here as it's only used on these "index.html" file and nowhere else.
	At the end there shown the old posts and also the common footer from the file "botom.php"
	Don't forget to replace
	* "$shareTitle" to include some text on the links that are shared
	* The text shown before all the old post as it's currently in Spanish ("Si quieres ver TODOS los artículos"...)
	
- .htaccess
	So far it just includes a list to provide the media type when serving some media files ("ogv", "mp4" and "webm")
	
- Images
	A part from all the mentioned files there are 4 images on this project:
		+ twitter.png
		+ rssFeed.png
		+ facebook.png
		+ comments.png
	Some of them may have copyright, so use them at your sole discretion as these may have to be changed by other non-copyrighted images.
	
Folders
	There're 5 main folders:
	+ Images: Containing all the images that are used on the post entries (images that are used often like facebook and twitter logos are on the root folder)
	+ Videos: For all the videos that are posted on each blog entry
	+ css: Contains the "css" stylesheets
	+ js: Contains all javascript files (so far it's just one)
	+ simplehtmldom_1_5: This folder contains "simplehtmldom" project which is needed to parse the entries to generate the rss and also to parse present the contents properly in general. The project's website is the following: http://sourceforge.net/projects/simplehtmldom/ ("simplehtmldom" is totally unrelated with this project in terms of development, but it's used here to parse some files)
	

------------------------------------------------------------------------------------------------------------

Thanks for your interest on this project, in case you need further explanation don't hesitate contacting me on twitter on wherever you feel like :-) I'm nestoralvaro