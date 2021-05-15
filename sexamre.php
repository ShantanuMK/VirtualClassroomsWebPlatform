<?php
  include "connect.php";
  session_start();
  date_default_timezone_set("Asia/Kolkata");
  $subid=$_SESSION['subid'];
  $subid=$_SESSION['subid'];
  $subid=$_SESSION['subid'];
  $subname=$_SESSION['subname'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $sid=$_SESSION['sid'];

  
  
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
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active">
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <li class="has-children">
                  <a href="about.php" class="nav-link text-left">About Us</a>
                  <ul class="dropdown">
                    <li><a href="">Our Teachers</a></li>
                    <li><a href="">Our School</a></li>
                  </ul>
                </li>
                <?php 
                if (isset($_SESSION['tid']) || isset($_SESSION['school_id']) || isset($_SESSION['sid'])) {

                 if (isset($_SESSION['tid'])) 
                  {
                    
                    echo '<li class="nav-item"><a href="dash_mentor.php" class="nav-link">Dashboard</a></li>';
                    
                  }
                  elseif (isset($_SESSION['sid'])) 
                  {
                    echo '<li class="nav-item"><a href="dash_student.php" class="nav-link">Dashboard</a></li>';
                  }
                  elseif (isset($_SESSION['school_id'])) 
                  {
                    echo '<li class="nav-item"><a href="dash_admin.php" class="nav-link">Dashboard</a></li>';
                  }

                  if (isset($_SESSION['sname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['sname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['tname'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['tname'].'</a></li>';
                  }
                  elseif (isset($_SESSION['school_name'])) {
                    echo '<li class="nav-item"><a href="" class="nav-link">'.$_SESSION['school_name'].'</a></li>';
                  }
                  echo '<li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>';
                }
                else {
                       echo '<li>
                          <a href="login_student.php" class="nav-link text-left">Students</a>
                        </li>
                        <li>
                          <a href="login_mentor.php" class="nav-link text-left">Teacher</a>
                        </li>
                        <li>
                          <a href="login_admin.php" class="nav-link text-left">School</a>
                        </li>';
                      }   
            ?>
              </ul>                                                                                                             
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <center><h2 class="mb-0"><?php echo'Class:'.$class,$div; echo' '.$subname;  ?></h2></center>
              
            </div>
          </div>
        </div>
      </div>
      <?php
        $result=mysqli_query($conn,"SELECT * FROM exam where subid=$subid and eid=(SELECT MAX(eid) FROM exam where subid=$subid )");
        $r12=mysqli_fetch_assoc($result);
        $extime=date("H:i",strtotime($r12['etime']));
        $current_time=date("H-i");
        $edate=date("Y-m-d",strtotime($r12['edate']));
        $current_date = date('Y-m-d');
        

        /*if ($current_time>=$extime and $current_time<=$eetime) {
          echo "<br>true";    
        }*/
        if ($current_date<=$edate) {
          echo "<br><p style='color:red'><marquee height='5%'>Exam is on ".$edate." at ".$extime."</marquee></p>";
        }
    
    ?> 

      <div class="site-section">
        <div class="container">
            <div class="row">
              <div class="col-md-4 mb-4">
                  <p>
                  <form method="post" action="subwork.php">
                            <input type="submit" name="exam" value="Exam" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="examre" value="Exam Results" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="assignment" value="Assignments" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="studymaterial" value="Study Material" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            <input type="submit" name="live" value="Join LIVE" class="btn btn-primary btn-lg px-5">
                            <br><br>
                            </form>
                    
                  </p>

                
                </div>
                <div class="col-lg-7 ml-auto align-self-center">
                  <div class="col-md-30 form-group">
                    <form action="" method="post" class="billing-form" enctype="multipart/form-data">
                <h2 class="section-title-underline mb-5">
                            <span>Exam Reports</span>
                        </h2>
                        
                        <?php 
                              $sql=mysqli_query($conn,"SELECT * FROM examgiven WHERE sid=$sid and eid in (SELECT eid from exam where subid=$subid) ");
                              

                              echo '<section class="ftco-section ftco-cart">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-30 ftco-animate">
                                          <div class="cart-list">
                                            <table class="table">
                                              <thead class="thead-primary">
                                                <tr class="text-center">
                                              <th>Exam</td>
                                              <th>Date</th>
                                              <th>Marks</th>
                                              <th>Percentage</th>
                                              </tr></thead><tbody>';
                              while($row = mysqli_fetch_array($sql)) {
                                $eid=$row['eid'];
                                $c1=mysqli_query($conn,"SELECT * FROM examq WHERE eid=$eid ");
                                $num=mysqli_num_rows($c1);
                                $ename=mysqli_query($conn,"SELECT * FROM exam where eid=$eid");
                                $eename=mysqli_fetch_assoc($ename);
                                echo '<tr class="text-center">';
                                 echo "<td>" . $eename['ename'] . "</td>";
                                echo "<td>" . $eename['edate'] . "</td>";
                                echo '<td>'.$row["emarks"].'/'.($num*2).'</td>';
                                echo '<td>' . (($row["emarks"])/($num*2))*100 . '%</td>';
                                echo "</tr>";
                              }
                              echo "</tbody></form></table></div></div></div></div></section>";
                        ?>
                         
                          
                            

                          
                 </form>
                    
</div>
                          
                          
                        
    
              </div>
              </div>
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