<?php 
  include "connect.php";
  session_start();
  $schoolid=$_SESSION['school_id'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  if (isset($_POST['add'])) {
   // $sloginid=$_POST['sloginid'];
    $semail=$_POST['semail'];
    $get1=mysqli_query($conn,"SELECT * FROM students where semail='$semail' ");
    $num=mysqli_num_rows($get1);
    if ($num==0) {
      $sname=$_POST['sname'];
      $ssrno=$_POST['ssrno'];
      $spassword=$_POST['spassword'];
      
      $smnum=$_POST['smnum'];
      $insert=mysqli_query($conn,"INSERT INTO students (ssrno,sname,sstd,sdiv,spassword,semail,smnum,school_id) VALUES ($ssrno,'$sname',$class,'$div','$spassword','$semail',$smnum,$schoolid) ");
      echo '<script>alert("Student Added Successfully")</script>';
      header("Location:view_class.php");
    }
    else {
      echo '<script>alert("Student Email-ID-ID already exists. Please Enter Different Email-ID")</script> ';
    }

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Nevsto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

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
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

 <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0">  -->
    <link rel="stylesheet" href="css/style1.css">


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"> “Failure is the opportunity to begin again more intelligently.” – Henry Ford</a> 
            
          </div>
          
        </div>
      </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="d-flex align-items-center">
          <img src="images/pogo.jpg" height="25%" width="25%" alt="Image" class="img-fluid">
          <div class="mr-auto">
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
         <i class="fas fa-bars"></i>
      </label>
      <?php
        if (isset($_SESSION['tid']) || isset($_SESSION['school_id']) || isset($_SESSION['sid'])) {
                  echo '<ul><li><a href="index.php"> Home</a></li>
                        <li><a href="about.php"> About Us</a></li>';
                 if (isset($_SESSION['tid'])) 
                  {
                    
                    echo '<li><a href="dash_mentor.php"> Dashboard</a></li>';
                    
                  }
                  elseif (isset($_SESSION['sid'])) 
                  {
                    echo '<li><a href="dash_student.php" >Dashboard</a></li>';
                  }
                  elseif (isset($_SESSION['school_id'])) 
                  {
                    echo '<li><a href="dash_admin.php"> Dashboard</a></li>';
                  }

                  if (isset($_SESSION['sname'])) {
                    echo '<li><a href="">'.$_SESSION['sname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['tname'])) {
                    echo '<li> <a href="">'.$_SESSION['tname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['school_name'])) {
                    echo '<li> <a href="">'.$_SESSION['school_name'].'</a></li>';
                  }
                  echo '<li> <a href="logout.php"> Log Out</a></li></ul>';
                }
                else {
                       echo '
                       <ul>
                        <li><a href="index.php"> Home</a></li>
                        <li><a href="about.php"> About Us</a></li>
                        <li><a href="login_student.php"> Student</a></li>
                        <li><a href="login_mentor.php"> Teacher</a></li>
                        <li><a href="login_admin.php"> School</a></li>
                         
                        </ul>
                        ';
                      }   
            ?>
</nav>
          </div>
        </div>
      </div>


    </header>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" >
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Register Student</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Register</span>
      </div>
    </div>
    <div class="site-section">
        <div class="container">
            <form action="register_student.php" method="post" class="billing-form" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="standard">Roll Number:</label>
                            <input type="number" name="ssrno" placeholder="" min="1" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="standard">Name</label>
                            <input type="text" name="sname" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="division">Email-ID</label>
                            <input type="email" name="semail" placeholder="" class="form-control form-control-lg" min="1" required>
                        </div>
                    
                        <div class="col-md-12 form-group">
                            <label for="standard">Password</label>
                            <input type="text" name="spassword" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        
                        
                        <div class="col-md-12 form-group">
                            <label for="num_students">Mobile Number</label>
                            <input type="tel" name="smnum" placeholder="" minlength="10" maxlength="10" class="form-control form-control-lg" required>
                            
                        </div>     
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="add" value="Add" class="btn btn-primary btn-lg px-5">
                            <a href="view_class.php" class="btn btn-primary btn-lg px-5">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            
</form>
          
        </div>
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

 <?php
  $conn=mysqli_connect("localhost","root","","academy");
  //mysqli_select_db($conn,"vegetable") or die();
 // if ($conn->connect_error) {
 //   die("Connection failed: " . $conn->connect_error);
   // }
// echo "Connected successfully";

  if(isset($_POST['Register']))
  {
    $ssname=$_POST['s_name'];
    $ssemail=$_POST['s_email'];
    $sspassword=$_POST['s_password'];

    echo $ssname;
    echo $ssemail;
    echo $sspassword;


    //$insert="INSERT INTO `student`(`sname`, `semail`, `spassword`) VALUES ()";
   // mysqli_querry($conn,"INSERT INTO 'student'('sname','semail','spassword') VALUES ('$ssname','$ssemail','$sspassword')");
      //mysqli_querry($conn,"INSERT INTO `student`(`sname`,`semail`,`spassword`) VALUES ('$ssname','$ssemail','$sspassword')");
      mysqli_query($conn,"INSERT INTO `student`(`sname`,`semail`,`spassword`) VALUES ('$ssname','$ssemail','$sspassword')");
  }
?>
