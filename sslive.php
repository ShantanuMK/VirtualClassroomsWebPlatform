<?php
  include "connect.php";
  session_start();
  $subid=$_SESSION['subid'];

  $school_id=$_SESSION['school_id'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $subname=$_SESSION['subname'];
  $sname=$_SESSION['sname'];
  $semail=$_SESSION['semail'];
  //$meet="school_".$school_id."_class_".$class."_div_".$div."_subid_".$subid;
  $meet="school_".$school_id."_class_".$class."_div_".$div."_neverstoplearning";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nevsto</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='https://abca.nevsto.com/external_api.js'></script>
	<script>
		$(document).ready(function(){
		const domain = 'abca.nevsto.com';
		const options = {
	    roomName: '<?php echo $meet; ?>',
	    
	    height: 700,
	    
    interfaceConfigOverwrite: { filmStripOnly: false,
      
      MAXIMUM_ZOOMING_COEFFICIENT: 1,
      
    NATIVE_APP_NAME: 'nevsto',
    SHOW_CHROME_EXTENSION_BANNER: false,

    SHOW_DEEP_LINKING_IMAGE: false,
    SHOW_JITSI_WATERMARK: true,
    SHOW_POWERED_BY: false,
    SHOW_PROMOTIONAL_CLOSE_PAGE: false,
    SHOW_WATERMARK_FOR_GUESTS: true,
    PROVIDER_NAME: ' ',
    SUPPORT_URL: ' ',
    
      TOOLBAR_BUTTONS: [
        'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
        'fodeviceselection', 'hangup', 'profile', 'chat',
        'etherpad', 'sharedvideo', 'settings', 'raisehand',
        'videoquality', 'filmstrip', 'stats', 'shortcuts',
        'tileview',
    ],
      
       },

    userInfo: {
        email: '<?php echo $semail; ?>',
        displayName: '<?php echo $sname; ?>',
    },
	    parentNode: document.querySelector('#meet')
};
	const api = new JitsiMeetExternalAPI(domain, options);
	api.executeCommand('subject', ' ');
});
	</script>
</head>
<body>
	<div>
   <pre><div id="meet"></div></pre>
  </div>
</body>
</html>