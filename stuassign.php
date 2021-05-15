<?php
  include "connect.php";
  session_start();
  $subid=$_SESSION['subid'];
  $sid=$_SESSION['sid'];

  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];
  $subname=$_SESSION['subname'];
  $school_id=$_SESSION['school_id'];
  $subid=$_SESSION['subid'];
  $subname=$_SESSION['subname'];
  $class=$_SESSION['cstd'];
  $div=$_SESSION['cdiv'];

  //$meet='001_school_'.$school_id.'_sub_'.$subid;
  //echo $meet;


  if (isset($_POST['enter'])) {
    $fid=$_POST['fid'];
    $extension1 = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $file = 'stu_'.$sid.'_file_'.$fid.'.'.$extension1;
    $target1 = "files/".basename($file);

    if($extension1=='pdf')
        {

              if (move_uploaded_file($_FILES['file']['tmp_name'], $target1)) {
                $msg = "File uploaded successfully";
              }else{
                $msg = "Failed to upload file";
              }

              $sq="INSERT INTO stufiles (fid,sid,sfilename) VALUES ($fid,$sid,'$file')";
              mysqli_query($conn, $sq);
              header("Location:subwork.php");
              
        }
    
  }

  if (isset($_POST['viewt'])) {
    $fid=$_POST['fid'];
      $select = "SELECT * FROM subfiles WHERE fid=$fid ";
      $result = $conn->query($select);
      while($row = $result->fetch_object()){
        $pdf = $row->filename;
        $path = 'files/';
        $file = $path.$pdf;
      }
      // Add header to load pdf file
      header('Content-type: application/pdf'); 
      header('Content-Disposition: inline; filename="' .$file. '"'); 
      header('Content-Transfer-Encoding: binary'); 
      header('Accept-Ranges: bytes'); 
      @readfile($file);
  }

  if (isset($_POST['views'])) {
    $fid=$_POST['fid'];
      $select = "SELECT * FROM stufiles WHERE fid=$fid and sid=$sid ";
      $result = $conn->query($select);
      while($row = $result->fetch_object()){
        $pdf = $row->sfilename;
        $path = 'files/';
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser3.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>



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
    <pre>


    </pre>
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
                    <form method="POST" action="stuassign.php">
                  <label for="username">View Pending Submission</label>
                        <form> <select class="form-control" name="users" onchange="showUser(this.value)" required><option value="">Select Assignment:</option>';
                          <?php 
                          $get_teacher=mysqli_query($conn,"SELECT * from subfiles where ftype=1 and subid=$subid and fid not in (select fid from stufiles where sid=$sid)");
                              while($row11=mysqli_fetch_array($get_teacher)) 
                              {
                                    echo '<option value='.$row11["fid"].'>'.$row11["ftname"].'</option>';
                                  }
      
                             echo '</select></form>
                             <br>
                             <div id="txtHint"><b>Assignment Details will be shown here</b></div>
                             <br>Your Previous Assignments:';

                            // $sql="SELECT * FROM subfiles WHERE subid=$subid and ftype=1";
                             $sql="SELECT * from subfiles where ftype=1 and subid=$subid and fid in (select fid from stufiles where sid=$sid)";
                             $result = mysqli_query($conn,$sql);

                          echo '<br><section class="ftco-section ftco-cart">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-20 ftco-animate">
                                      <div class="cart-list">
                                        <table class="table">
                                        
                                          <thead class="thead-primary">
                                            <tr class="text-center">

                                          <th>Name</th>
                                          <th>File</th>
                                          <th>Your File</th>
                                          <th>Date</th>
                                          </tr></thead><tbody>';
                          while($row = mysqli_fetch_array($result)) {
                            $fid=$row['fid'];
                            $sn=mysqli_query($conn,"SELECT * FROM stufiles where fid=$fid and sid=$sid");
                            $sna=mysqli_fetch_assoc($sn);
                            echo '<tr class="text-center">';
                            echo "<td>" . $row['ftname'] . "</td>";
                            echo '<td class="product-name"><form method="post" action="stuassign.php"><input type="hidden" name="fid" value='.$fid.'><input type="submit" name="viewt" class="btn-link" value="File ('.$row['filename'].')">
                                              </form></td>';
                            echo '<td class="product-name"><form method="post" action="stuassign.php"><input type="hidden" name="fid" value='.$fid.'><input type="hidden" name="sid" value='.$sid.'><input type="submit" name="views" class="btn-link" value="File ('.$sna['sfilename'].')">
                                              </form></td>';
                            echo "<td>" . $sna['subdate'] . "</td>";
                            echo "</tr>";
                          }
                          echo "</tbody></table></div></div></div></div></section>";
                             

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
