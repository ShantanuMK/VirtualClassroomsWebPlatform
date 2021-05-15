<?php
  include "connect.php";
  session_start();

  
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Nevsto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
   <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<?php
$q = intval($_GET['q']);

$fid=$q;

$get=mysqli_query($conn,"SELECT * FROM teachers where tid = '".$q."'");
$get1=mysqli_fetch_assoc($get);
echo "<br>Name: ".$get1['tname'];
echo "<br>Email: ".$get1['temail'];
echo "<br>Password: ".$get1['tpassword'];
echo "<br>Mobile: ".$get1['tmobile'];


$sql="SELECT * FROM subjects WHERE tid = '".$q."'";
$result = mysqli_query($conn,$sql);

echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-30 ftco-animate">
            <div class=" ">
              <table class="table">
              
                <thead class="thead-primary">
                  <tr class="text-center">

                <th>Subject</th>
                <th>Class</th>
                <th>Division</th>
                </tr></thead><tbody>
                <pre>
                </pre>';
while($row = mysqli_fetch_array($result)) {
  echo '<tr class="text-center">';
  echo "<td>" . $row['subname'] . "</td>";
  echo "<td>" . $row['substd'] . "</td>";
  echo "<td>" . $row['subdiv'] . "</td>";
  echo "</tr>";
}
echo "</tbody></table></div></div></div></div></section>";

?>
    

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



