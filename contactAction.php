<?php 
	$messages = "click";
	if(isset($submit) && $submit=="Submit")
	{
		echo "<script type='text/javascript'>alert('$messages');</script>";
	}
	else {
		echo "click";
	}
	?>
</html>

