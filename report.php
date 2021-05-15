<?php
  include "connect.php";
  session_start();
  if (isset($_POST['view'])) {
      $fid=$_POST['fid'];
      $select = "SELECT * FROM course WHERE cid='$fid' ";
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
              <h2 class="mb-0">Reports</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>

      <?php 
      if ($_SESSION['report']==2) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center"> 
                    <th>Course ID</th> 
                    <th>Course name</th>
                    <th>Course Details</th>
                    <th>Fees</th>
                    <th>Duration</th>
                    <th>Mentor name</th>
                    <th>Mentor Email</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM course ");
                  while ($row=mysqli_fetch_array($c1)) {
                      $iid=$row['cid'];
                      $iiname=$row['cname'];
                      $iifile=$row['cfile'];
                      $imid=$row['mid'];
                    echo '<tr class="text-center">
                      
                    
                    <td>'.$iid.'</td>
                    <td>'.$row["cname"].'</td>
                    
                    <td class="product-name"><form method="POST" action="approve.php" ><input type="hidden" name="fid" value='.$iid.'><input type="submit" name="view" class="btn-link" value="File ('.$row['cfile'].')">
                    </td>
                    
                    
                    
                    <td class="quantity">'.$row["cfees"].'
                    </td>
                    <td>'.$row["cmonths"].' Months</td>
                    
                    ';
                    $m1=mysqli_query($conn,"SELECT * FROM mentor WHERE mid='$imid'");
                    $m2=mysqli_fetch_array($m1);
                    $mmname=$m2['mname'];
                    $mmemail=$m2['memail'];
                    echo '<td class="total">'.$mmname.'
                    </td>
                    <td class="seller">'.$mmemail.'</td>';
                
                    if($row['capprove']==0){echo "<td><span style='color:blue'>Action not taken</span></td>";}
                    if($row['capprove']==1){echo "<td><span style='color:green'>Approved</span></td>";}
                    if($row['capprove']==2){echo "<td><span style='color:red'>Disapproved</span></td>";}
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }

  if ($_SESSION['report']==3) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">  
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Password</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM student ");
                  while ($row=mysqli_fetch_array($c1)) {
                      
                    echo '<tr class="text-center">
                      
                    
                    
                    <td>'.$row["sid"].'</td>
                    
                    <td>'.$row["sname"].'
                    </td>
                    
                    
                    
                    <td>'.$row["semail"].'
                    </td>
                    <td>'.$row["spassword"].'</td>
                    
                    ';
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }


  if ($_SESSION['report']==4) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">  
                    <th>Mentor ID</th>
                    <th>Mentor Name</th>
                    <th>Mentor Email</th>
                    <th>mentor Password</th>
                    <th>Total Earned</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM mentor ");
                  while ($row=mysqli_fetch_array($c1)) {
                      
                    echo '<tr class="text-center">
                      
                    
                    
                    <td>'.$row["mid"].'</td>
                    
                    <td>'.$row["mname"].'
                    </td>
                    
                    
                    
                    <td>'.$row["memail"].'
                    </td>
                    <td>'.$row["mpassword"].'</td>
                    <td>'.$row["mtearned"].'</td>
                    
                    ';
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }
  if ($_SESSION['report']==5) {
        echo '<section class="ftco-section ftco-cart">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="cart-list">
              <table class="table">
                <form method="post" action="">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>StudentID</th> 
                    <th>StudentName</th> 
                    <th>CourseID</th> 
                    <th>CourseName</th>
                    <th>MentorID</th>
                    <th>MentorName</th>
                    <th>Fees</th>
                    <th>Card</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>';
      
      
                       
                 $c1=mysqli_query($conn,"SELECT * FROM payments ");
                  while ($row=mysqli_fetch_array($c1)) {
                      
                    echo '<tr class="text-center">
                      
                    
                    <td>'.$row["sid"].'</td>
                    <td>'.$row["sname"].'</td>
                    <td>'.$row["cid"].'</td>
                    <td>'.$row["cname"].'</td>
                    <td>'.$row["mid"].'</td>
                    <td>'.$row["mname"].'</td>
                    <td class="quantity">'.$row["fees"].'</td>
                    <td class="quantity">'.$row["cardnumber"].'</td>
                    <td>'.$row["date"].'</td>
                    
                    ';
                    
               
                    
                  echo "</tr>";
                 }

              echo '   
                </tbody>
                </form>
              </table>
            </div>
          </div>
        </div>
    </section>';

  }
  ?>

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