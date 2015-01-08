<?php
ob_start(); /* template body */ ?>	<div class="clear"></div>

	<div class="footer">
		Copyright &copy; 2007-<?php echo date('Y');?> <?php echo $this->scope["title"];?> <!-- Damn, this shit is old-->- Some rights reserved<br />
- kusaba x v. SUPER-DUPER-HACKED-TOGETHER-COPYPASTA-SHITFEST-PENIS edition + Took WHY DO YOU CARE seconds -
	</div>

	</body>
				
<!-- Start Open Web Analytics Tracker -->
<script type="text/javascript">
//<![CDATA[
var owa_baseUrl = 'http://anal.314chan.org/';
var owa_cmds = owa_cmds || [];
owa_cmds.push(['setSiteId', '3b255593e892e38748ef9756495909b9']);
owa_cmds.push(['trackPageView']);
owa_cmds.push(['trackClicks']);
owa_cmds.push(['trackDomStream']);

(function() {
	var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
	owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
	_owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
	var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
}());
//]]>
</script>
<!-- End Open Web Analytics Code -->
				
		
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>