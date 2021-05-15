<?php 

  include "connect.php";
  session_start();
  $subid=$_SESSION['subid'];
  $sid=$_SESSION['sid'];
  $school_id=$_SESSION['school_id'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $subname=$_SESSION['subname'];

  $subid=$_SESSION['subid'];
  $subname=$_SESSION['subname'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];

  $sname=$_SESSION['sname'];
  $semail=$_SESSION['semail'];

  
  $meet='001_school_'.$school_id.'_sub_'.$subid;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Nevsto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://meet.jit.si/external_api.js'></script>
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/styless.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">

  <script> 
    $(document).ready(function(){
      var domain = 'meet.jit.si';
      var options = {
    roomName: '<?php echo"$meet"?>',
   
    height: 700,
    userInfo: {
        email: '<?php echo"$semail"?>',
        displayName: '<?php echo"$sname"?>'
    }

    configOverwrite: { 
      remoteVideoMenu: {
        disableKick: true
      },
     },
    interfaceConfigOverwrite: { filmStripOnly: false,
    JITSI_WATERMARK_LINK: ' ',
    HIDE_KICK_BUTTON_FOR_GUESTS: false,
    MAXIMUM_ZOOMING_COEFFICIENT: 1,
    NATIVE_APP_NAME: 'Nsett',
    SHOW_CHROME_EXTENSION_BANNER: false,

    SHOW_DEEP_LINKING_IMAGE: false,
    SHOW_JITSI_WATERMARK: false,
    SHOW_POWERED_BY: false,
    SHOW_PROMOTIONAL_CLOSE_PAGE: false,
    SHOW_WATERMARK_FOR_GUESTS: false,
    PROVIDER_NAME: ' ',
    SUPPORT_URL: ' ',
    JITSI_WATERMARK_LINK: ' ',
    JITSI_WATERMARK_LINK: ' ',
    LIVE_STREAMING_HELP_LINK: ' ',
    TOOLBAR_BUTTONS: [
        'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
        'fodeviceselection', 'hangup', 'profile', 'chat', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
        'videoquality', 'filmstrip', 'feedback', 'stats', 'shortcuts',
        'tileview', 'videobackgroundblur', 'download'
    ],
      
       },

    parentNode: document.querySelector('#meet'),
    };
    var api = new JitsiMeetExternalAPI(domain, options);
    api.executeCommand('subject', ' ');
    });
  </script>



</head>

<body>

  <div class="site-wrap">
    
    <div id="meet">
   </div>

    
              
    

  </div>


    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>