<?php 
  session_start();
  include "connect.php";
  
  $msg = "";
  if (isset($_POST['upload'])) {

    $ccname=$_POST['c_name'];
    $ccdescription=$_POST['c_description'];
    $ccfees=$_POST['c_fees'];
    $cduration=$_POST['c_duration'];
    $result=mysqli_query($db,"SELECT * FROM course WHERE cid=(SELECT MAX(cid) FROM course);");
    $row=mysqli_fetch_array($result);
    $c=$row['cid']+1;

    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $image = 'course_'.$c.'.'.$extension;
    $target = "images/".basename($image);

    $extension1 = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $file = 'file_'.$c.'.'.$extension1;
    $target1 = "files/".basename($file);
    
    $cmid=$_SESSION['mid'];


    $allowed = array('jpg','jpeg','png');
    if(in_array($extension, $allowed) && $extension1=='pdf')
        {
    
              if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                //echo '<script>alert("image uploaded")</script>';
              }else{
                $msg = "Failed to upload image";
              }

              if (move_uploaded_file($_FILES['file']['tmp_name'], $target1)) {
                $msg = "File uploaded successfully";
              }else{
                $msg = "Failed to upload file";
              }
              $sq="INSERT INTO course (cname,cimage,cfees,cfile,cdescription,mid,cmonths) VALUES ('$ccname','$image','$ccfees','$file','$ccdescription','$cmid','$cduration')";
              mysqli_query($db, $sq);
              $_SESSION['cid']=$c;
              echo '<script>alert("Course Details uploaded Successfully. Now upload course material.")</script>';
              header("Location: upload_material.php");
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
              <h2 class="mb-0">Upload Course</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 

      <div class="site-section">
        <div class="container">

            <form action="upload_course.php" method="post" class="billing-form" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Course Name</label>
                            <input type="text" name="c_name" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Course Description</label>
                            <div>
                                  <textarea 
                                id="text" 
                                cols="40" 
                                rows="4" 
                                name="c_description" 
                                placeholder="Say something about this course..."></textarea>
                            </div>  
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="Fees">Course Fees</label>
                            <input type="number" name="c_fees" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="Fees">Course Duration (In Months)</label>
                            <input type="number" id="quantity" name="c_duration" min="1" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="Fees">Course Image (Only in 'jpeg','jpg','png')</label>
                            <div>
                                <input type="hidden" name="size" value="10000">
                                  <div>
                                      <input type="file" name="image">
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="Fees">Course Details file (Only in PDF format)</label>
                            <div>
                                <input type="hidden" name="size" value="10000">
                                  <div>
                                      <input type="file" name="file">
                                  </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="upload" value="Upload" class="btn btn-primary btn-lg px-5">
                            <a href="index.php" class="btn btn-primary btn-lg px-5">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            
</form>
          
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