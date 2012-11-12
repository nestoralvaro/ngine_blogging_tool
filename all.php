<?php
include("top.php");
?>
        
        	<!-- Use http://firefogg.org/make/index.html (on Firefox) to convert videos -->
        	<!-- Each entry has the following structure --> 
        	
        	<!-- POST-->
        	<!--
        	<div class="post">
        		<div class="time">
        			<div class="time-day"></div>
        			<div class="time-month"></div>
        			<div class="time-year"></div>
        		</div>
        		<div class="title">
	        		<a href="showPost.php?postId=0" target="_blank">
	        		</a>
        		</div>
        		<div class="entry">
        		</div>
        		<div class="labels">
        		</div>
        		<div class="share">
        		</div>
        	</div>
        	-->
			<!-- END POST-->

        	<!-- POST-->
        	<div class="post">
        		<div class="title">
	        		<a href="showPost.php?postId=1" target="_blank">Post title</a>
        		</div>
        		<div class="time">
        			<div class="time-day">23</div>
        			<div class="separator">-</div>
        			<div class="time-month">10</div>
        			<div class="separator">-</div>
        			<div class="time-year">2012</div>
        		</div>
        		<div class="entry">
        			Hi, this is a test.
        			<br />
        			Let's see a sample video.
        			<br />
					<div class="rotate90cw" style="margin:50px; clear:both; ">
					  <video width="320" height="240" controls="controls" preload="auto">
						<source src="videos/myVideo.webm" type='video/webm; codecs="vp8, vorbis"' >
						<source src="videos/myVideo.ogv"  type='video/ogg; codecs="theora, vorbis"' >
						Your browser does not support the video tag.
					  </video>
					</div>
					<br />
					The video is rotated in purpose (90 Deg clockwise) by using the CSS class "rotate90cw".
					<br />
        			Here it's some more sample text, and below an image.
        			<br />
        			<img src="images/myImage.jpg" alt ="this is a test image" />
					<br />        			
        		</div>
        		<div class="labels">
        			TestLabel_1, TestLabel_2
        		</div>
        		<div class="share">
        		</div>
        	</div>
        	<!-- END POST-->
        	
<?php
include("bottom.php");
?>
