<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<!--Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.-->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Content View</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<!-- Navbar Section-->
  <nav id = "bgcolor">
    <div class = "container">
      <div class="row">
        <div class = "col-sm-12">
          <img src="img\FullLogo.png" alt="" class = "img-size ">
        </div>
      </div>
    </div>
  </nav>
<!-- End of Navbar Section-->

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 lefthand-side">
        <a href="projectinfo.php"><h3><br><br><br><br><br><br><br><br><br><br><br>Total Project<br><br><br><br><br><br><br><br><br><br><br></h3></a>
      </div>
      <div class="col-sm-6 righthand-side">
        <a href="voterinfo.php"><h3><br><br><br><br><br><br><br><br><br><br><br>Voter information<br><br><br><br><br><br><br><br><br><br><br></h3></a>
      </div>
    </div>
  </div>
</section>




<!-- Start of Footer-->
<section id="tablefoot">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <a href="logout.php"><h4 class="text-center">Logout</h4></a>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/navbar.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
