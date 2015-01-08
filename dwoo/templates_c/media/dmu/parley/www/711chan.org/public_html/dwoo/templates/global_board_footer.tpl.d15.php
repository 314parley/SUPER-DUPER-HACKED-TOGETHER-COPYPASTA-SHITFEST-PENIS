<?php
ob_start(); /* template body */ ?><a name="bottom"></a>
<script type="text/javascript" src="<?php echo $this->scope["cwebpath"];?>lib/javascript/k-ba.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["cwebpath"];?>lib/javascript/anonymizer.js"></script>
<!-- initialize savetheinternet's link anonymizer-->
</body>
</html>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>