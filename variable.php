<!DOCTYPE html> 
<html> 

<head> 
	<title> 
		How to pass variables and data 
		from PHP to JavaScript? 
	</title> 
</head> 

<body style="text-align:center;"> 
	
	<h1 style="color:green;">GeeksforGeeks</h1> 
	
	<h4> 
		How to pass variables and data 
		from PHP to JavaScript? 
	</h4> 
	
	<?php 
		$name = "Hello pune"; 
	?> 

	<script type="text/javascript"> 
		var x = "<?php echo"$name"?>"; 
		document.write(x); 
	</script> 
</body> 

<html> 
