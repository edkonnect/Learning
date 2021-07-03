<?php
// Initialize the session
session_start();
$userflag= "";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if(isset($_SESSION["user_flag"])){
    $userflag = $_SESSION["user_flag"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=us-ascii"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name="description" content=""><meta name="author" content="">
	<title>Student Portal - EdKonnect Academy</title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" /><!-- Custom styles for this template -->
	<link href="css/simple-sidebar.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="d-flex" id="wrapper"><!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
<div class="sidebar-heading"><b>EdKonnect Academy</b></div>

<div class="list-group list-group-flush" align="center">
    <a class="list-group-item list-group-item-action bg-light" href="myviewcourse.php"><i class='fa fa-book' style='font-size:36px' aria-hidden="true"></i></br> <b>View Course</b></a> 
<a class="list-group-item list-group-item-action bg-light" href="mysession.php" text-align="center"><i class="fa fa-sticky-note-o" style="font-size:36px" text-align="center"></i></br><b>Session Notes</b></a>
<!--a class="list-group-item list-group-item-action bg-light" href="#">Knowledge Corner</a-->
<a class="list-group-item list-group-item-action bg-light" href="uploadhw.php"><i class="fa fa-upload" style="font-size:36px"></i> </br><b>Upload Homework </b></a>
<a class="list-group-item list-group-item-action bg-light" href="myhomework.php"><i class="fa fa-header" style="font-size:36px"></i> </br><b>Review Homework </b></a>
<a class="list-group-item list-group-item-action bg-light" href="mental-math.php"><i class="fa fa-calculator" style="font-size:36px"></i> </br><b> Mental Math Practice</b></a>
<a class="list-group-item list-group-item-action bg-light" href="assessmenttest.php"><i class="fa fa-check-square-o" style="font-size:36px"></i> </br><b>Assessment Test</b></a>
<?php

if ($userflag == "E" || $userflag == "A"){
?>
<a class="list-group-item list-group-item-action bg-light" href="myquizlet.php"><i class="fa fa-info-circle" style="font-size:36px"></i> </br><b>Quizlets  (Grades 1-5)</b></a>
<?php
}
?>
<?php

if ($userflag == "H"  || $userflag == "A"){
?>
<a class="list-group-item list-group-item-action bg-light" href="myquizlet-sat.php"><i class="fa fa-info-circle" style="font-size:36px"></i> </br><b>Quizlets (Grades 9-12)</b></a>
<?php
}
?>


</div>
</div>
<!-- /#sidebar-wrapper --><!-- Page Content -->

<div id="page-content-wrapper">
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"><button class="btn btn-primary" id="menu-toggle">Toggle Menu</button><button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"></button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
	<li class="nav-item active"><a class="nav-link bg-dark text-white" href="#">Home <span class="sr-only">(current)</span></a></li>
	<li class="nav-item"><a class="nav-link" href="resetpwd.php">Reset Password</a></li>
	<li class="nav-item"><a class="nav-link" href="addstudent.php">Add a Student </a></li>
	<!--li class="nav-item dropdown"><a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">Student Profile </a>
	<div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">-------</a>
	<div class="dropdown-divider"></div>
	<a class="dropdown-item" href="addstudent.php">Add Student</a></div>
	</li-->
	<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
</ul>
</div>
</nav>

<div class="container-fluid">
<h2 class="mt-4" style="font-size:40px;">Welcome to Edkonnect Academy</h2>
<p></p>

<p style="font-size:20px;">Please read this important information about how to use the student portal</p>

 <div class="card" style="max-width: 58rem;">
    
    <div class="card-body">
      <p class="card-text" style="font-size:15px;"><b>All Homework and ad-hoc Assessment tests can be accessed from 'Session Notes' section.</b></p>
      <p class="card-text" style="font-size:15px;"><b>Only student's Homework related documents can be uploaded using 'Upload Homework' link.</b></p>
          <p class="card-text" style="font-size:15px;"><b>Monthly Assessment tests can be accessed through 'Assessment Test' link.</b></p>
    </div>
</div>
<p>
   <!--iframe src="https://app.acuityscheduling.com/schedule.php?owner=18852823&appointmentType=14691452" title="Schedule Appointment" width="100%" height="800" frameBorder="0"></iframe><script src="https://embed.acuityscheduling.com/js/embed.js" type="text/javascript"></script-->
   </p>

<div class="card-deck">
<div class="card border-dark mb-3" style="max-width: 28rem;">
  <div class="card-header" style="font-size:25px;"><b>Monthly Math Challenge</b></div>
  <div class="card-body text-dark">
    <h5 class="card-title">Unknown Numbers</h5>
    <p class="card-text"> <b>A A  + </br> A A </br>_________</br> C A B </br> </b>In the above problem different letters represent different digits, what does digit A represent? </p>
    <h5 class="card-title">Simple Calculation</h5>
    <p class="card-text">A book store carries 41 wooden toys and 48 plastic toys. Everyday, the store sells 3 wooden toys and 4 plastic toys. After how many days there are same number of both toys left in the store??</p>
    <h5 class="card-title">Money Problem</h5>
    <p class="card-text"> A cellphone and case together cost $100. If cellphone costs $90 more than the case, how much does the case cost?</p>
   <h5 class="card-title">Decode</h5>
    <p class="card-text">Ben delivers the same number of newspapers each day. Let's say X is the number of newspapers he delivers each day, how do you represent arriving the value of X if he delivers 280 papers weekly?
 ?</p>
   
  </div>
</div>
<div class="card border-dark mb-3" style="max-width: 28rem;">
  <div class="card-header" style="font-size:25px;"><b>Newsletter</b></div>
   <div class="card-body text-dark">
    <h5 class="card-title">Most American parents can't help kids with math, science homework beyond 6th grade</h5>
    <p class="card-text">Many parents don't think they would be the best tutor for their child beyond early middle school....
    <a href="https://www.foxnews.com/lifestyle/american-parents-math-science-homewoork-report"> Read More</a></p>
  </div>
  <div class="card-body text-dark">
    <h5 class="card-title">When You’re Not a ‘Math Person’ and Your Kid Needs Help</h5>
    <p class="card-text">Nearly all schoolwork is now homework, and many parents are struggling to support their kids at home..... 
    <a href="https://www.nytimes.com/2020/04/22/well/family/coronavirus-home-school-math-help.html"> Read More</a></p>
  </div>
   <div class="card-body text-dark">
    <h5 class="card-title">Online Learning Should Return to a Supporting Role</h5>
    <p class="card-text">Winner-take-all economics and cost-cutting may make many in-person lectures obsolete, but the best education continues to be intensive, expensive and done in person..... <a href="  https://www.nytimes.com/2020/04/09/business/online-learning-virus.html"> Read More</a></p>
  </div>
  
  
 

</div>
<div class="card border-dark mb-3" style="max-width: 28rem;">
  <div class="card-header" style="font-size:25px;"><b>Facts and Trivia</b></div>
  <div class="card-body text-dark">
    <h5 class="card-title">Prime number</h5>
    <p class="card-text">Number 2 is the only even prime number. No prime number greater than 5 ends in a 5.</p>
    <h5>Number divisible by 9</h5>
    <p class="card-text">To find a number is divisible by 9, the sum of their digits should be divisible by 9 </p>
     <h5 class="card-title">Meaning of Equal =</h5>
    <p class="card-text">the word 'equal' is from the Latin word aequalis as meaning uniform, identical, or equal.</p>
   
     <h5 class="card-title">Number Zero - '0'</h5>
        <p class="card-text">The value of zero was first used by the ancient Indian mathematician Aryabhata.</p>
        
        <h5 class="card-title">A Size Paper</h5>
        <p class="card-text">The ratio of the longer to the shorter side of any A-size paper (A3, A4 etc) is equal to the square root of 2.</p>
        
        
           <h5 class="card-title">Jiffy</h5>
        <p class="card-text">The term "jiffy" is an actual unit of time which is the 1/100th of a second.</p>
        
</div>
</div>

<!--div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="test.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div-->


</div>
</div>

<!-- /#page-content-wrapper --></div>
<!-- /#wrapper --><!-- Bootstrap core JavaScript --><script src="vendor/jquery/jquery.min.js"></script><script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><!-- Menu Toggle Script --><script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script></body>
</html>