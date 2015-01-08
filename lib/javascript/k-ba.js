
// - Settings
	//image hover is broken. 
	//NOTE TO SELF: report bug/try to fix image hover, because it doesn't work as expected.
	var ihov = 0; //Image Hovers. 1 = Show full image on thumbnail hover, 0 = off.
		var ihovH = "100%"; //Max Height of Image Hovers.
		var ihovW = "70%"; //Max Width of Image Hovers.
		var offX = 10; //Horizontal position of image hovers relative to the mouse. i.e. 10 means the image appears 10 pixels to the right of the pointer.
		var offY = 150; //Vertical position of image hovers relative to the mouse. i.e. 150 means the top of the image appears 150 pixels above the pointer.
		var thmnly = 0; //Whether to make image hovers on thumbnails only, or linked images too. 1 = thumbnails only, 0 = thumbnails, file titles, and posted links.
	var bckl = 1; //Backlinks. 1 = Add links to a post's replies in it's header, 0 = off.
		var shwr = 1; //Label replies. 1 = Add "Replies: " before a row of backlinks, 0 = off.
	var agif = 1; //Animate .GIFs. 1 = Automatically animate .GIF thumbnails, 0 = off.

// - Some globals, don't change
	var d=document;
	var db=document.body;
	var offY=-offY;
	
// - Business		
	if (ihov == 1){
		var aElm = d.getElementsByTagName('a');
		var oImg = d.createElement('img');
		oImg.setAttribute('src','');
		oImg.setAttribute('id','hovx');
		oImg.style.maxHeight = ihovH;
		oImg.style.maxWidth = ihovW;
		db.appendChild(oImg,db.firstChild);
		for (i=0; i<aElm.length; i++) {
		if (aElm[i].href.match(/\.(jpg|jpeg|gif|png)$/)) {
		if (thmnly == 1 && aElm[i].innerHTML.indexOf("\/thumb\/") != -1 || thmnly != 1){
		aElm[i].onmouseover = function() { oImg.setAttribute('src', this.href); }
		aElm[i].onmouseout = function() { oImg.setAttribute('src',''); }
		function killLnk() { oImg.setAttribute('src',''); }
		aElm[i].addEventListener('click',killLnk, false);
		var divName = 'hovx';
		function mouseX(evt) {
		if (!evt) evt = window.event; 
		if (evt.pageX) return evt.pageX; 
		else if (evt.clientX)return evt.clientX + (d.documentElement.scrollLeft ?  d.documentElement.scrollLeft : db.scrollLeft); 
		else return 0; }
		function mouseY(evt) {
		if (!evt) evt = window.event; 
		if (evt.pageY) return evt.pageY; 
		else if (evt.clientY)return evt.clientY + (d.documentElement.scrollTop ? d.documentElement.scrollTop : db.scrollTop); 
		else return 0; }
		function follow(evt) {
		if (d.getElementById) {var obj = d.getElementById(divName).style; obj.visibility = 'visible'; obj.position = 'absolute';
		obj.left = (parseInt(mouseX(evt))+offX) + 'px';
		obj.top = (parseInt(mouseY(evt))+offY) + 'px';
		var mousewindow = parseFloat(parseInt(mouseY(evt))) - parseFloat(d.documentElement.scrollTop) - parseFloat(150);
		var obwindow = parseFloat(window.innerHeight) - parseFloat(d.getElementById(divName).height);
		var obwsi = parseFloat(d.documentElement.scrollTop) + parseFloat(window.innerHeight) - parseFloat(d.getElementById(divName).height) - parseFloat(5);
		if (mousewindow > obwindow) {obj.top = obwsi + 'px';}
		if (parseInt(mouseY(evt)) < parseFloat(d.documentElement.scrollTop) + parseFloat(150)) {obj.top = parseFloat(d.documentElement.scrollTop) + parseFloat(5) + 'px';}}}
		d.onmousemove = follow;}}}
	}
	
	if (bckl == 1){
		function updateBackLinks() {
		var passValue = d.getElementsByName('postpassword')[0].value;
		var nameValue = d.getElementsByName('name')[0].value;
		var i;
		var links = d.getElementsByTagName('a');
		var linkslen = links.length;
		for (i=0;i<linkslen;i++){
		var linksclass = links[i].getAttribute('class');
		var testref = links[i].parentNode.getAttribute('class');
		if (linksclass != null && linksclass.indexOf('ref|') != -1 && (testref == undefined || testref != 'reflink')) {
		var post = links[i].href.substr(links[i].href.indexOf('#') + 1);
		var reply = links[i].parentNode.parentNode.parentNode.getElementsByTagName('a')[0].name;
		var board = links[i].href.substring(0, links[i].href.indexOf('/res'));
		board = board.substring(board.lastIndexOf('/')+1);
		var tr = links[i].href.substring(links[i].href.lastIndexOf('/')+1, links[i].href.lastIndexOf('.'));					
		addBackLinks(reply, post, tr, board);}}	
		function addBackLinks (reply, post, tr, board) {
		var postid = d.getElementById('reply' + post);
		if (postid != undefined) {		
		var postrefl = postid.querySelectorAll('span.reflink')[0];					
		if (postrefl.innerHTML.indexOf(reply) == -1){	
		if (shwr == 1){
		if (postrefl.innerHTML.indexOf('<resps>Replies:</resps>') == -1){
		postrefl.innerHTML += '<resps>Replies:</resps>'; }} 		
		var e = d.createElement('a');
		e.innerHTML='&nbsp;<u>>>' + reply + '</u>';
		e.setAttribute('href','/' + board + '/res/' + tr + '.html#' + reply);
		e.setAttribute('class','ref|' + board + '|' + tr + '|' + reply);
		e.setAttribute('onclick','return highlight(\'' + reply + '\', true);');
		postrefl.appendChild(e)
		return linkslen++; }}
		var tpostid = d.getElementById('thread' + post + board);
		if (tpostid != undefined) {
		var tpostrefl = tpostid.querySelectorAll('span.reflink')[0];
		if (tpostrefl.innerHTML.indexOf(reply) == -1){	
		if (shwr == 1){
		if (tpostrefl.innerHTML.indexOf('<resps>Replies:</resps>') == -1){
		tpostrefl.innerHTML += '<resps>Replies:</resps>'; }} 		
		var te = d.createElement('a');
		te.innerHTML='&nbsp;<u>>>' + reply + '</u>';
		te.setAttribute('href','/' + board + '/res/' + tr + '.html#' + reply);
		te.setAttribute('class','ref|' + board + '|' + tr + '|' + reply);
		te.setAttribute('onclick','return highlight(\'' + reply + '\', true);');
		tpostrefl.appendChild(te);
		return linkslen++;}}}
		d.getElementsByName('postpassword')[0].value = passValue;
		d.getElementsByName('name')[0].value = nameValue;	
		return 0;}
		updateBackLinks();
	}
	
	if (agif == 1){
		function animaGifs() {
		var thumbs = document.getElementsByTagName("img");
		var num = thumbs.length;
		for(i = 0; i < num; i++){
		if(thumbs[i].className == "thumb"){
		if(thumbs[i].src.match(".gif")){
		thumbs[i].src = thumbs[i].src.replace("s.gif", ".gif");
		thumbs[i].src = thumbs[i].src.replace("thumb", "src");}}}}
		animaGifs();
	}
	