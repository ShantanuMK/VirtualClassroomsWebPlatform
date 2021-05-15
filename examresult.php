<?php
  session_start();
  
  //echo $_SESSION['answers'];
  $ttt=unserialize($_SESSION['answers']);
  for ($i=0; $i <$_SESSION['eqnum'] ; $i++) { 
        //echo $_POST['aa'.$i];
        $time[]=$_POST['aa'.$i];
      }
      $_SESSION['answers']=serialize($time);
      
      $correct=0;
      $wrong=0;
      $marks=0;
      $getexam="SELECT * FROM examq WHERE eid=$eid ";
      $resexam=mysqli_query($conn,$getexam);
      $i=0;
      while ($row=mysqli_fetch_array($resexam) ) {
        if($row['ecorrect']==$time[$i]) {
          $correct=$correct+1;
          $marks=$marks+2;
          ;
        }
        elseif ($row['equec']!=$time[$i]) {
          $wrong=$wrong+1;
        }
        $i++;
      }
      $upresult="INSERT INTO examgiven (eid,sid,emarks) VALUES ($eid,$sid,$marks) ";
      if(mysqli_query($conn,$upresult)) {
        //mysqli_query($conn,"INSERT INTO examgiven (eid,sid,emarks) VALUES ($eid,$sid,$marks)");
        echo '<script>alert("Exam submitted Successfully")</script>';
        header("Location:dash_student.php");
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
              <h2 class="mb-0">Your Result</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 
      <div class="row">
                        <h3 class="section-title mb-5">
                            <span><pre>                        Total Marks: <?php echo $marks; ?></pre></span>
                        </h3>
                        <h3 class="section-title mb-5">
                            <span><pre>         Correct: <?php echo $correct; ?></pre></span>
                        </h3>
                        <h3 class="section-title mb-5">
                            <span><pre>         Wrong: <?php echo $wrong; ?></pre></span>
                        </h3>
</div>
      <form action="examresult.php" method="post" class="billing-form" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                      
                        <div class="row">
                          <?php 
                            //$enumber=$_SESSION['vvvr'];
                            $getexam="SELECT * FROM examq WHERE cid='$ccc' and cvid='$vvv' ";
                            $resexam=mysqli_query($conn,$getexam);
                            $getnum=mysqli_num_rows($resexam);
                            $_SESSION['eqnum']=$getnum;
                            $i=0;
                            while ($row=mysqli_fetch_array($resexam)) {
                            
                            
                            
                              echo '<div class="col-md-12 form-group">
                                                
                                    </div>
                                            <div class="col-md-12 form-group">
                                              <label><span style="color:black">Question '.$row['eqn'].': </span>'.$row['eque'].'</label>
                                            </div>         
                                        </div>
                                        <div class="row">
                                          <ol type="a">
                                            <li>'.$row['eqa'].'</li>
                                            <li>'.$row['eqb'].'</li>
                                            <li>'.$row['eqc'].'</li>
                                            <li>'.$row['eqd'].'</li>
                                          </ol>
                                        </div>
                                        
                                        <label>Your answer: '.$ttt[$i].'</label>';
                                        if ($row['equec']==$ttt[$i]) {
                                          echo '<br><label><span style="color:green">Correct</span></label>';
                                        }
                                        else {
                                          echo '<div><span style="color:red">Wrong Answer! </span></div>';
                                          echo 'The Correct answer is: '.$row['equec'].'';
                                        }
                                         echo '<div class="row">';
                                         $i++;
                            }
                          ?>
                         
                        <div class="col-12">
                            <input type="submit" name="upload" value="Continue Course" class="btn btn-primary btn-lg px-5">
                            
                        </div>
                    </div>
                </div>
            </div>   
          </form>
      
                      
                    
      


    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="images/logo.png" alt="Image" class="img-fluid"></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>  
            <p><a href="#">Learn More</a></p>
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