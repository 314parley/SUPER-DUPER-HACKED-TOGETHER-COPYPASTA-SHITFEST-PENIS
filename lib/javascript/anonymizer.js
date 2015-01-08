/*
 *  Copyright (c) 2011 Michael Save <savetheinternet@omegasdg.com>
 *  
 *  I give permission for you to do whatever you'd like to do with this software.
 *
 */
 
anonymizer = function() {
	var addslashes = function(str) {
		return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
	}
	
	var links = document.getElementsByTagName('a');
	for(var i = 0; i < links.length; i++) {
		var link = links[i];
		if(link.href && link.href.match(/^(?:https?:)?\/\//)) {
			if(navigator.userAgent.search(/msie/i) >= 0) {
				// Internet Explorer (data URI scheme not implemented)
				link.href = "javascript:window.open('" + addslashes(link.href) + "', 'something' + -~(Math.random()*1000));";
			} else if(window.opera) {
				// Opera (data URI scheme carries referrer)
				link.href = "javascript:prompt('Copy/paste this into your address bar:', '" + addslashes(link.href) + "');void 0;";
			} else {
				// Other
				link.onclick = function() {
					this.href = "data:text/html," +
						"<!doctype html><html><head>" +
							"<title>Redirecting...</title>" +
							"<meta http-equiv=\"refresh\" content=\"0; url=" + this.href + "\">" +
						"</head></html>";
					return true;
				};
			}
		}
	}
};

