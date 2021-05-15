<?php
  include "connect.php";
  session_start();
  $ccc=$_SESSION['cid'];
  $sss=$_SESSION['sid'];
  $c1=mysqli_query($conn,"SELECT * FROM course WHERE cid='$ccc' ");
  $c12=mysqli_fetch_array($c1);
  $ccname=$c12['cname'];

  if (isset($_POST['resume'])) {
    header("Location:course_work.php");
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
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0"><?php echo $ccname; ?></h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 
<pre>


</pre>
    <section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>&nbsp;</th>
                    <th>Topic name</th>
                    <th>Video Seen</th>
                    <th>Exam Given</th>
                    <th>Exam Marks</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $count=0;
                    $outoff=0;
                    $mk=0;
                    //$r12="SELECT DISTINCT a.cvid,a.cid,a.cvname,a.topicname,b.sid,b.videos,b.examg,b.examm from coursevideo a, coursetaken b WHERE a.cid='$ccc' and b.sid='$sss' AND a.cid=b.cid ";
                   // $r12="SELECT DISTINCT a.cvid,a.cid,a.cvname,a.topicname,b.sid,b.videos,b.examg,b.examm from coursevideo a, coursetaken b WHERE a.cid='$ccc' and b.sid='$sss' AND a.cid=b.cid GROUP BY cvid ";
                    $r12="SELECT * FROM coursetaken where sid='$sss' AND cid='$ccc'";
                    $result=mysqli_query($conn,$r12);            
                    $num=mysqli_num_rows($result);
                  while ($row=mysqli_fetch_array($result)) {
                      
                      $i=$row['cvid'];
                      $t1=mysqli_query($conn,"SELECT * FROM coursevideo WHERE cid='$ccc' AND cvid='$i' ");
                      $t2=mysqli_fetch_array($t1);
                      $iitopicname=$t2['topicname'];
                      //$final_total=$final_total+$row['ptotal_price'];
                    echo '<tr class="text-center">
                      
                    
                    
                    <td></td>
                    
                    <td class="product-name">
                      <h3>'.$iitopicname.'</h3>
                      <p></p>
                    </td>';
                    
                    if($row["videos"]==1){
                      echo '<td class="quantity"><span>&#10003;</span>
                    </td>';
                    }
                    else{
                      echo '<td class="quantity"><span>&#x2718;</span>
                    </td>';
                    }
                    if($row["examg"]==1){
                      echo '<td class="quantity"><span>&#10003;</span>
                    </td>';
                    }
                    else{
                      echo '<td class="quantity"><span>&#x2718;</span>
                    </td>';
                    }

                    $q12=mysqli_query($conn,"SELECT * FROM examq where cid='$ccc' and cvid='$i' ");
                    $q123=mysqli_num_rows($q12);
                    $tm=$q123*2;
                    $outoff=$outoff+$tm;
                    $mk=$mk+$row['examm'];
                   
                    echo '
                    <td class="total">'.$row["examm"].'/'.$tm.'</td>
                    <td class="seller">';
                  echo "</tr>";
                 if ($row['videos']==1 and $row['examg']==1) {
                   $count=$count+1;
                 }
                    
                  }
    ?>
                
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>    
    </section>
<pre>


</pre>    

<?php 
  if ($num==$count) {
    $per=$mk/$outoff*100;
    echo '<center><h3 class="mb-0">Congratulations! You Have Completed This Course. </h3></center>';
    if ($per>40) {
      echo '<center><span style="color:green"><h4>Passed With '.$per.'%.</h4></span></center>';
    }
    else {
      echo '<center><span style="color:red"><h4>Failed With '.$per.'%.</h4></span></center>';
    }
  }
  else {
    /*echo '<div class="col-xl-5">
            
      <div class="row mt-5 pt-3">
      <div class="col-md-12">
                <div class="cart-detail p-3 p-md-4"><form method="post" action="course_report.php">
            <center><input type="submit" class="btn btn-primary py-3 px-4" name="resume" value="Resume Course"></center>
      </form>
    </div>
  </div>
</div>
</div>';*/
  }
  ?>
<pre>



</pre>

    
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