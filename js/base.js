			// Opens a new Window
			function openNewWindow() {
				window.open(this.src);
			}
			// Adds the corresponding events listeners
			function createNewEvent (el, func, evt){
			    // Chrome & FF
			    if (document.addEventListener) {
			        el.addEventListener(evt, func, false);
			    // For IE
			    } else if(document.attachEvent) {
			        el.attachEvent("on" + evt, func);
			    }        
			}
			function startTheFun() {
				// Makes all images within "post" clickable to view them enlarged
				var imagesDiv = document.getElementsByClassName("container")[0];
				var images = imagesDiv.getElementsByTagName("img");
				// Adds a listener to each image
        	    for(var i=0; i<images.length; i++) {
        	    	if ((images[i].className != "shareImg" ) && (images[i].className != "instaImg" )) {
	        	    	createNewEvent(images[i], openNewWindow, "click");
        	    	}	        	
	            }
        		// Changes the title dinamically        	
        		var titles = ["Lo que veo en Japón", "Cosas que me pasan en Tokio", "Ver para creer", "O_O"];
    	    	var elem = Math.floor((Math.random()*titles.length));
				titulo.innerHTML = titles[elem];
			}
			document.addEventListener('DOMContentLoaded', startTheFun, false);

			
// Share a location on facebook
function shareOnFacebook(postName, urlPost) {
    var facebook='http://www.facebook.com/share',
    page='.php?src=bm&v=4&i=1308998013&u='+encodeURIComponent(urlPost)+'&t='+encodeURIComponent(postName);	
    if (!window.open(facebook+'r'+page, 'sharer','toolbar=0, status=0, resizable=1')) {
        document.location.href=facebook+page;
    }
}


// Share a location on twitter
function shareOnTwitter(postName, urlPost) {
    var twitterLink = "http://twitter.com/share?original_referer="
    var siteBaseUrl = encodeURIComponent(urlPost);
    twitterLink += siteBaseUrl + "&source=tweetbutton&text=";
    twitterLink += encodeURIComponent(postName) + "&url=" + siteBaseUrl;
    if (!window.open(twitterLink)) {
        document.location.href=twitterLink;
    }
}
