<?php 
  include "connect.php";
  session_start();
  date_default_timezone_set("Asia/Kolkata");
  $sid=$_SESSION['sid'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $school_id=$_SESSION['school_id'];


  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $school_id=$_SESSION['school_id'];


  $tt=mysqli_query($conn,"SELECT * FROM timetable where sstd=$class and sdiv='$div' and school_id=$school_id ");
  $t1=mysqli_fetch_assoc($tt);
  $iname=$t1['iname'];
  
  if (isset($_POST['vsub'])) {
    $_SESSION['subid']=$_POST['subid'];
    $subid=$_POST['subid'];
    $res=mysqli_query($conn,"SELECT * FROM subjects where subid=$subid ");
    $res1=mysqli_fetch_assoc($res);
    $_SESSION['subname']=$res1['subname'];
    header("Location:subwork.php");
    
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

    
    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Welcome <?php echo $_SESSION['sname']; ?></h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 

      <div class="site-section">
        <div class="container">
            <div class="row">
              <?php
                $sql="SELECT * from subjects where substd=$class and subdiv='$div' and school_id=$school_id";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result))
                {
                  $tid=$row['tid'];
                  $subid=$row['subid'];
                  $numsub=mysqli_query($conn,"SELECT * from subfiles where ftype=1 and subid=$subid and fid not in (select fid from stufiles where sid=$sid)");
                  $num=mysqli_num_rows($numsub);
                  $result1=mysqli_query($conn,"SELECT * FROM teachers where tid=$tid");
                  $row1=mysqli_fetch_assoc($result1);

                  
                  
                  echo '<div class="col-lg-4 col-md-6 mb-4">
                        <form method="POST" action="dash_student.php">
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <div class="category"><center><h3>'.$row["subname"].'</h3></center></div> 
                        </figure>
                        <div class="course-1-content pb-4">
                        <center><h3>'.$row1["tname"].'</h3></center>
                        
                        <center><h5>Pending Submission: '.$num.'</h5></center>
                        ';
                        
                       echo '
                        
                        <p><input type="hidden" name="subid" value="'.$row["subid"].'"><input type="submit" name="vsub" value="View This Subject" class="btn btn-primary btn-lg px-5">
                        </p>
                        </div>
                    </div></form>
                </div>';


                }
                ?>
                

            </div>
        </div>
    </div>

    <?php echo '<center><img src="images/'.$iname.'" alt="Timetable" align="center" height="100%" width="100%"></center>' ?>

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