<?php
  include "connect.php";
  session_start();
  $eid=$_SESSION['eid'];
  $sid=$_SESSION['sid'];

        $sql="SELECT * from examgiven where eid=$eid and sid=$sid";
        $gets=mysqli_query($conn,$sql);
        if (mysqli_num_rows($gets)==1) {
          echo '<script>alert("You have already given this Exam")</script>';
          header("Location:subwork.php");
        }
       
 
 

$set=mysqli_query($conn,"SELECT * from exam where eid=$eid");
  $r1=mysqli_fetch_assoc($set);
  $dur=$r1['eduration'];



  if (isset($_POST['upload'])) {
    echo "its set";
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
      //mysqli_query($conn,"UPDATE coursetaken SET examg=1 , examm='$marks' WHERE cid='$ccc' and sid='$sss' and cvid='$vvv'");
     // $s="UPDATE coursetaken set examm='$marks' WHERE sid='$sss'";


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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    var seconds = <?php echo $dur*60; ?>;
      function secondPassed() {
          var minutes = Math.round((seconds - 30)/60),
              remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
          if (seconds == 0) {
              clearInterval(countdownTimer);
             //form1 is your form name
             
            //document.form1.submit();
            
            //document.getElementById("form1").submit();
            document.getElementById('upload12').click(); 
  

          } else {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);
  </script>





</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" onload="secondPassed()">

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
              <h2 class="mb-0">Exam Questions</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div> 
<pre>                                      <div>
         <center><h1> <p style='color:red'>  <time id="countdown"></time></p></h1></center>
        </div></pre>
      <form action="exam.php" method="post" name="form1" id="form1">
            <div class="row justify-content-center">
                <div class="col-md-5">
                   

                          <?php 
                            $eid=$_SESSION['eid'];
                            $getexam="SELECT * FROM examq WHERE eid=$eid ";
                            $resexam=mysqli_query($conn,$getexam);
                            $getnum=mysqli_num_rows($resexam);
                            $_SESSION['eqnum']=$getnum;
                            $i=0;
                            $m=1;
                            while ($row=mysqli_fetch_array($resexam)) {
                              echo '
                               <div class="row"><div class="col-md-12 form-group"</div>
                                            <div class="col-md-12 form-group"><h3>Question '.$m.':</h3></div>
                                            <div class="col-md-12 form-group"><label><h4>'.$row['eq'].'</h4></label></div>               
                                        </div>
                                        
                                            <div>
                                              <input type="radio" name="aa'.$i.'" value="a">' .$row['ea'].'</input><br>
                                              <input type="radio" name="aa'.$i.'" value="b">' .$row['eb'].'</input><br>
                                              <input type="radio" name="aa'.$i.'" value="c">' .$row['ec'].'</input><br>
                                              <input type="radio" name="aa'.$i.'" value="d">' .$row['ed'].'</input><br>
                                              </div>
                                          <div>
                                          </div></div>

                                         ';
                                         $i++;
                                         $m=$m+1;
                            }
                          ?>
                         <pre><center>
       <div class="col-12">
                    <input type="submit" name="upload" id="upload12" value="Submit Exam" class="btn btn-primary btn-lg px-5">   
                        </div></center>
                      </pre>
                    </div>
                </div>   
          </form>
      
                      
                    
      


    
    

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