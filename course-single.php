<?php
  include "connect.php";
  session_start();
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $result1=mysqli_query($conn,"SELECT COUNT(*) FROM students where sstd=$class and sdiv='$div'");
  $row1=mysqli_fetch_assoc($result1);

  if (isset($_SESSION['sid'])) {
    $sss=$_SESSION['sid'];
  }
  if (isset($_POST['enroll'])) {
    if (isset($_SESSION['sid'])) {
      $get12=mysqli_query($conn,"SELECT * FROM coursetaken where cid='$ccc'");
      $get13=mysqli_num_rows($get12);  
      if ($get13==0) {
          header("Location:payment.php");
      }
      else {
      echo '<script>alert("You Have Already Enrolled For This Course")</script>';
      }  
    }
    else {
      echo '<script>alert("Please Login First To Enroll For This Course")</script>';
    } 
  }

  if (isset($_POST['view'])) {
      $fid=$_POST['fid'];
      $select = "SELECT * FROM course WHERE cid='$ccc' ";
      $result = $conn->query($select);
      while($row = $result->fetch_object()){
        $pdf = $row->cfile;
        $path = 'files/';
        //$date = $row->created_date;
        $file = $path.$pdf;
      }
      // Add header to load pdf file
      header('Content-type: application/pdf'); 
      header('Content-Disposition: inline; filename="' .$file. '"'); 
      header('Content-Transfer-Encoding: binary'); 
      header('Accept-Ranges: bytes'); 
      @readfile($file);
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
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

 <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0">  -->
    <link rel="stylesheet" href="css/style1.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
            <a href="#" class="small mr-3"> ‘Never let formal education get in the way of your learning.’ –Mark Twain</a> 
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
          <div class="row align-items-end">
            <div class="col-lg-7">
              <center><h2 class="mb-0"><?php echo $_SESSION['cstd'],$_SESSION['cdiv']; ?></h2></center>
              
            </div>
          </div>
        </div>
      </div> 
    

    <div class="custom-breadcrumns border-bottom">
      <div class="container">
        <a href="dash_admin.php">Dashboard</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="classes.php">Classes</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current"><?php echo $_SESSION['cstd'],$_SESSION['cdiv']; ?></span>
      </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-10 ml-auto align-self-center">
                        <h2 class="section-title-underline mb-5">
                            <span><?php echo $_SESSION['cstd'],$_SESSION['cdiv']; ?></span>
                        </h2>
                        
                        <p><strong class="text-black d-block">Class Teacher: </strong></p>
                        <p><strong class="text-black d-block">Students in class: <?php echo $row1['COUNT(*)']; ?></strong></p>
                        
                        <p><strong class="text-black d-block">Subjects: </strong></p>
                        <ol>
                        <?php 
                        $query1="SELECT * FROM subjects WHERE substd=$class and subdiv='$div' and school_id=1";
                        $result1=mysqli_query($conn,$query1);
                        while ($row=mysqli_fetch_array($result1)) {
                          $id=$row['tid'];
                          $res=mysqli_query($conn,"SELECT tname from teachers where tid=$id");
                          $row1=mysqli_fetch_assoc($res);
                          echo '<strong class="text-black d-block"><li>'.$row["subname"].':-'.$row1['tname'].'</li>
                            </strong> ';
                        }
                        ?>
                         </ol>
                          
                            

                          </p>
                        
    
                </div>
                <p><form method="post" action="course-single.php">
                            <input type="submit" name="addsub" value="Add Subjects" class="btn btn-primary btn-lg px-5">
                            <input type="submit" name="enroll" value="Modify Subjects" class="btn btn-primary btn-lg px-5">
                            <input type="submit" name="enroll" value="View Students" class="btn btn-primary btn-lg px-5">
                            <input type="submit" name="enroll" value="Add Students" class="btn btn-primary btn-lg px-5">
                            </form>
                </p>
            </div>
        </div>
    </div>

    
      

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
            
          </div>
          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Our Campus</span></h3>
            <ul class="list-unstyled">
                <li><a href="#">Acedemic</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Our Interns</a></li>
                <li><a href="#">Our Leadership</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Human Resources</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Our Courses</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Math</a></li>
                  <li><a href="#">Science &amp; Engineering</a></li>
                  <li><a href="#">Arts &amp; Humanities</a></li>
                  <li><a href="#">Economics &amp; Finance</a></li>
                  <li><a href="#">Business Administration</a></li>
                  <li><a href="#">Computer Science</a></li>
              </ul>
          </div>
          <div class="col-lg-3">
              <h3 class="footer-heading"><span>Contact</span></h3>
              <ul class="list-unstyled">
                  <li><a href="#">Help Center</a></li>
                  <li><a href="#">Support Community</a></li>
                  <li><a href="#">Press</a></li>
                  <li><a href="#">Share Your Story</a></li>
                  <li><a href="#">Our Supporters</a></li>
              </ul>
          </div>
        </div>

        
      </div>
    </div>
    

  </div>
  

  <!-- loader -->
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