<?php
ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html<?php echo $this->scope["htmloptions"];?> xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $this->scope["title"];?></title>
<link rel="shortcut icon" href="<?php echo $this->scope["cwebpath"];?>/favicon.ico" />
<?php if ((isset($this->scope["locale"]) ? $this->scope["locale"] : null) != 'en') {
?>
	<link rel="gettext" type="application/x-po" href="<?php echo $this->scope["cwebpath"];?>/inc/lang/<?php echo $this->scope["locale"];?>/LC_MESSAGES/kusaba.po" />
<?php 
}?>

<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="Sat, 17 Mar 1990 00:00:01 GMT" />
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo KU_CHARSET;?>" />
<script type="text/javascript" src="<?php echo $this->scope["cwebpath"];?>/lib/javascript/gettext.js"></script>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>