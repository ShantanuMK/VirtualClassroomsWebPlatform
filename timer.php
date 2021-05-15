<?php
	include "connect.php";
	$set=mysqli_query($conn,"SELECT * from exam where eid=7");
	$r1=mysqli_fetch_assoc($set);
	$dur=$r1['eduration'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Nevsto</title>
	<script type="text/javascript">
		var seconds = <?php echo $dur*60; ?>;
      function secondPassed() {
          var minutes = Math.round((seconds - 30)/60),
              remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
          if (seconds == 0) {
              clearInterval(countdownTimer);
             //form1 is your form name
            document.form1.submit();
          } else {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);
	</script>
</head>
<body>
	<pre>

	</pre>
	
	<br>
	<div>
         <h1> <p style='color:red'>  <time id="countdown"><?php echo $dur*60; ?></time></p></h1>
        </div>
<form action="index.php" name="form1" id="form1">

</body>

</html>
