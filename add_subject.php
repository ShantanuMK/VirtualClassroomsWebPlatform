<?php
 include "connect.php";
  session_start();
  $school_id=$_SESSION['school_id'];
  if (isset($_POST['upload'])) {
    $subname=$_POST['s_name'];
    $subtid=$_POST['users'];
    $class=$_SESSION['cstd'];
    $div=$_SESSION['cdiv'];
    $school_id=$_SESSION['school_id'];

    $check_subject="SELECT * FROM subjects where subname='$subname' and substd=$class and  subdiv='$div' and school_id=$school_id ";
    $get=mysqli_query($conn,$check_subject);
    if (mysqli_num_rows($get)!=0) {
      echo '<script>alert("Subject is already present")</script>';
    }
    else {
    mysqli_query($conn,"INSERT INTO subjects (subname,substd,subdiv,tid,school_id) values ('$subname',$class,'$div',$subtid,$school_id)");
    echo '<script>alert("Subject Successfully Added")';
    header("Location:view_class.php");
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

 <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0">  -->
    <link rel="stylesheet" href="css/style1.css">


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
    xmlhttp.open("GET","getuser.php?q="+str,true);
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
    <div class="site-section">
        <div class="container">

            <form method="post" class="billing-form" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Subject Name</label>
                            <input type="text" name="s_name" placeholder="" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                        <label for="username">Allocate Teacher for this Subject</label>
                        <form> <select class="form-control" name="users" onchange="showUser(this.value)" required><option value="">Select Teacher:</option>';
                              <?php 
                              $teacher="SELECT * from teachers where school_id=$school_id";
                              $get_teacher=mysqli_query($conn,$teacher);
                              
                              while($row11=mysqli_fetch_array($get_teacher)) 
                              {
                                $teacher_name=$row11['tname'];
                                $teacher_id=$row11['tid'];
                                $subj="SELECT COUNT(*) from subjects where tid=$teacher_id";
                                $sub_result=mysqli_query($conn,$subj);
                                $subjects_num=mysqli_fetch_assoc($sub_result);

                                echo '<option value='.$teacher_id.'>'.$teacher_name.' ('.$subjects_num["COUNT(*)"].')</option>';
                                
                             } 
                             echo '</select></form>
                             <br>
                             <div id="txtHint"><b>Current Subjects of teacher will be shown here</b></div>';
                             

                        ?>
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" name="upload" value="Allocate" class="btn btn-primary btn-lg px-5">
                            <a href="view_class.php" class="btn btn-primary btn-lg px-5">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            
</form>
          
        </div>
    </div>


    
<pre>





</pre>   

  

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


