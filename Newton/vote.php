<?php
$Connection=mysql_connect('localhost','root',''); //Establishing Connection with the database
$Selected=mysql_select_db('newton_db',$Connection);  //Selecting our Database
$nameError='';
$numberError='';
if(isset($_POST['Submit'])) {


  if(!empty($_POST['Name'])) {

    $name=Test_user_input($_POST['Name']);

    if(!preg_match("/^[A-Za-z. ]*$/",$name)) {

      $nameError="<script type='text/javascript'> alert('Invalid Name Entered') </script>";
      echo $nameError;

    } //End of Name Regular Expression Check
  } // End Of Name Validation

  if(!empty($_POST['Number'])) {

    $number=Test_user_input($_POST['Number']);

    if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$number)) {

      $numberError="<script type='text/javascript'> alert('Invalid Number Entered') </script>";
      echo $numberError;

    } //End of Number Regular Expression Check
  } // End of Number Validation

if (!empty($_POST['Name']) && !empty($_POST['Number'])) {


  if((preg_match("/^[A-Za-z. ]*$/",$name)==true)&&(preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$number)==true)) {

    $Name=$_POST["Name"];
    $Number=$_POST["Number"];
    $Query="INSERT INTO voter_info(name,number)
            VALUES('$Name','$Number')";
    	$Execute=mysql_query($Query);


      // if this is a postback ...
      if(isset($_POST['projects'])) {
         // create array of acceptable values
         $ok = array('Auto-Bots (Computer-01)', 'Automatic Light Dipper (Computer-02)', 'Oil Refinery Machine (Computer-03)', 'Mobile Detector (Computer-04)', 'Voice Base Email (Computer-05)',
                      'Automatic Transformer Load Sharing with PLC/Scala Monitoring (Electrical-01)', 'Eddy Current Braking System (Electrical-02)', 'Hi-Tech Solar WheelChair (Electrical-03)', 'Digital Stick for Blind Person (Electrical-04)', 'Robo-Sweeper (Electrical-05)',
                      'Manually Goods Carry trolley (Mechanical-01)', 'Gearless Power Transmission (Mechanical-02)', 'Pneumatic Rotatable Trolley (Mechanical-03)', 'Bowling Machine (Mechanical-04)', 'Self Rechargeable Electric bike (Mechanical-05)',
                      'Anti-Earthquake System for Building (Civil-01)', 'Brick-Masonry Work Replace by Plastic Bottles (Civil-02)', 'Leonardo da Vincis Self Supporting Bridge (Civil-03)', 'Permeable Pavement (Civil-04)', 'The Falkrik Wheel (Civil-05)');
         // if we have an acceptable value for color_name ...
         if(in_array($_POST['projects'], $ok)) {
            // update the counter for that color
            $q = mysql_query("UPDATE projectresult SET projectvote = projectvote + 1 WHERE projectname = '" . $_POST['projects'] . "'");
         }
      }

      // get current color click counts
      $rs = mysql_query("SELECT * FROM projectresult");
      if(mysql_num_rows($rs) > 0) {
       while($row = mysql_fetch_array($rs)) {
          $count[$row['projectname']] = $row['projectvote'];
       }
      }


 echo $new="<script type='text/javascript'> var show; show=window.open('thankyou.html','_self');</script>";

} // End of Submit onclick Regular Expression Check



} // End of Submit onclick Validation



} // End of Submit button

function Test_user_input($Data){
  return $Data;
} // End of Function

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Submit Your vote</title>

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
      <nav id = "bg-color">
        <div class = "container">
          <div class="row">
            <div class = "col-sm-12">
              <a href="index.html"><img src="img\FullLogo.png" alt="" class = "img-size "></a>
            </div>
        </div>
        </div>
      </nav>
    <!-- End of Navbar Section-->


<section class="tabs">
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="panel with-nav-tabs panel-primary">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1primary" data-toggle="tab"><img src="img\rank.png" alt="" class="tabs-icon">Total Projects </a></li>
                <li><a href="#tab2primary" data-toggle="tab"><img src="img\computer.png" alt="" class="tabs-icon">Computer Engineering </a></li>
                <li><a href="#tab3primary" data-toggle="tab"><img src="img\electrical.png" alt="" class="tabs-icon">Electrical Engineering</a></li>
                <li><a href="#tab4primary" data-toggle="tab"><img src="img\mechanical.png" alt="" class="tabs-icon">Mechanical Engineering</a></li>
                <li><a href="#tab5primary" data-toggle="tab"><img src="img\civil.png" alt="" class="tabs-icon">Civil Engineering</a></li>
              </ul>
          </div>
      <div class="panel-body">
          <div class="tab-content">

<!--Total-Project Tab Starts-->
        <div class="tab-pane fade in active" id="tab1primary">
      <form action="vote.php" method="post">
          <div class="row">
            <label>
              <input id="cs_01" type="radio" name="projects" value="Auto-Bots (Computer-01)" />
              <img src="img\autobots(cs01).png" title="Auto-Bots">
            </label>

            <label>
              <input id="cs_02" type="radio" name="projects" value="Automatic Light Dipper (Computer-02)"/>
              <img src="img\automaticlightdipper(cs02).png" title="Automatic Light Dipper">
            </label>

            <label>
              <input id="cs_03" type="radio" name="projects" value="Oil Refinery Machine (Computer-03)" />
              <img src="img\oilrefinarymachine(cs03).png" title="Oil Refinary Machine">
            </label>

            <label>
              <input id="cs_04" type="radio" name="projects" value="Mobile Detector (Computer-04)" />
              <img src="img\mobiledetector(cs04).png" title="Mobile Detector">
            </label>

            <label>
              <input id="cs_05" type="radio" name="projects" value="Voice Base Email (Computer-05)" />
              <img src="img\voicebaseemail(cs05).png" title="Voice Base Email">
            </label>

            <label>
              <input id="ee_01" type="radio" name="projects" value="Automatic Transformer Load Sharing with PLC/Scala Monitoring (Electrical-01)"/>
              <img src="img\automatictransformerloadsharingbywithplc-scalamoniterning(ee01).png" title="Automatic Transformer Load Sharing with PLC/Scala Moniterning">
            </label>

            <label>
              <input id="ee_02" type="radio" name="projects" value="Eddy Current Braking System (Electrical-02)" />
              <img src="img\eddycurrentbrakingsystem(ee02).png" title="Eddy Current Braking System">
            </label>

            <label>
              <input id="ee_03" type="radio" name="projects" value="Hi-Tech Solar WheelChair (Electrical-03)" />
              <img src="img\hitechsolarwheelchair(ee03).png" title="Hi-Tech Solar WheelChair">
            </label>

            <label>
              <input id="ee_04" type="radio" name="projects" value="Digital Stick for Blind Person (Electrical-04)" />
              <img src="img\digitalstickforblindperson(ee04).png" title="Digital Stick for Blind Person">
            </label>

            <label>
              <input id="ee_05" type="radio" name="projects" value="Robo-Sweeper (Electrical-05)"/>
              <img src="img\robosweaper(ee05).png" title="Robo-Sweaper">
            </label>

            <label>
              <input id="me_01" type="radio" name="projects" value="Manually Goods Carry trolley (Mechanical-01)" />
              <img src="img\manuallygoodscarrytrolley(me01).png" title="Manually Goods Carry Trolley">
            </label>

            <label>
              <input id="me_02" type="radio" name="projects" value="Gearless Power Transmission (Mechanical-02)" />
              <img src="img\gearlesspowertransmission(me02).png" title="Gearless Power Transmission">
            </label>

            <label>
              <input id="me_03" type="radio" name="projects" value="Pneumatic Rotatable Trolley (Mechanical-03)" />
              <img src="img\pnuematicrotatabletrolley(me03).png" title="Pnuematic Rotatable Trolley">
            </label>

            <label>
              <input id="me_04" type="radio" name="projects" value="Bowling Machine (Mechanical-04)"/>
              <img src="img\bowlingmachine(me04).png" title="Bowling Machine">
            </label>

            <label>
              <input id="me_05" type="radio" name="projects" value="Self Rechargeable Electric bike (Mechanical-05)" />
              <img src="img\selfchargeableelectricbike(me05).png" title="Self Chargeable Electric Bike">
            </label>

            <label>
              <input id="ce_01" type="radio" name="projects" value="Anti-Earthquake System for Building (Civil-01)" />
              <img src="img\antiearthquakesystemforbuilding(ce01).png" title="Anti-Earthquake System for Building">
            </label>

            <label>
              <input id="ce_02" type="radio" name="projects" value="Brick-Masonry Work Replace by Plastic Bottles (Civil-02)" />
              <img src="img\brickmasonaryworkreplacebyplasticbottels(ce02).png" title="Brick-Masonary Work Replace by Plastic Bottels">
            </label>

            <label>
              <input id="ce_03" type="radio" name="projects" value="Leonardo da Vincis Self Supporting Bridge (Civil-03)" />
              <img src="img\leonardoselfsupportingbridge(ce03).png" title="Leonardo da Vincis Self Supporting Bridge">
            </label>

            <label>
              <input id="ce_04" type="radio" name="projects" value="Permeable Pavement (Civil-04)" />
              <img src="img\permiablepavement(ce04).png" title="Permeable Pavement">
            </label>

            <label>
              <input id="ce_05" type="radio" name="projects" value="The Falkrik Wheel (Civil-05)" />
              <img src="img\thefalkrikwheel(ce05).png" title="The Falkrik Wheel">
            </label>

      </div><!-- Row Ends -->
</div> <!--Total Projects tab1 End-->

<!--Computer Engineering Tab Starts-->
        <div class="tab-pane fade" id="tab2primary">

          <div class="row">
            <label>
              <img src="img\autobots(cs01).png" title="Auto-Bots">
            </label>

            <label>
              <img src="img\automaticlightdipper(cs02).png" title="Automatic Light Dipper">
            </label>

            <label>
              <img src="img\oilrefinarymachine(cs03).png" title="Oil Refinary Machine">
            </label>

            <label>
              <img src="img\mobiledetector(cs04).png" title="Mobile Detector">
            </label>

            <label>
              <img src="img\voicebaseemail(cs05).png" title="Voice Base Email">
            </label>



          </div><!--Row Ends-->

        </div><!--Computer Engineering-->

<!--Electrical Engineering Tab Starts-->
        <div class="tab-pane fade" id="tab3primary">

          <div class="row">
            <label>
              <img src="img\automatictransformerloadsharingbywithplc-scalamoniterning(ee01).png" title="Automatic Transformer Load Sharing with PLC/Scala Moniterning">
            </label>

            <label>
              <img src="img\eddycurrentbrakingsystem(ee02).png" title="Eddy Current Braking System">
            </label>

            <label>
              <img src="img\hitechsolarwheelchair(ee03).png" title="Hi-Tech Solar WheelChair">
            </label>

            <label>
              <img src="img\digitalstickforblindperson(ee04).png" title="Digital Stick for Blind Person">
            </label>

            <label>
              <img src="img\robosweaper(ee05).png" title="Robo-Sweeper">
            </label>



          </div><!--Row Ends-->

        </div><!--Electrical Engineering-->

<!--Mechanical Engineering Tab Starts-->
        <div class="tab-pane fade" id="tab4primary">

          <div class="row">
            <label>
              <img src="img\manuallygoodscarrytrolley(me01).png" alt="" title="Manually Goods Carry Trolley">
            </label>

            <label>
              <img src="img\gearlesspowertransmission(me02).png" alt="" title="Gearless Power Transmission">
            </label>

            <label>
              <img src="img\pnuematicrotatabletrolley(me03).png" alt="" title="Pnuematic Rotatable Trolley">
            </label>

            <label>
              <img src="img\bowlingmachine(me04).png" alt="" title="Bowling Machine">
            </label>

            <label>
              <img src="img\selfchargeableelectricbike(me05).png" alt="" title="Self Chargeable Electric Bike">
            </label>



          </div><!--Row Ends-->

        </div><!--Mechanical Engineering-->

<!--Civil Engineering Tab Starts-->
        <div class="tab-pane fade" id="tab5primary">

          <div class="row">
            <label>
              <img src="img\antiearthquakesystemforbuilding(ce01).png" title="Anti-Earthquake System for Building">
            </label>

            <label>
              <img src="img\brickmasonaryworkreplacebyplasticbottels(ce02).png" title="Brick-Masonary Work Replace by Plastic Bottels">
            </label>

            <label>
              <img src="img\leonardoselfsupportingbridge(ce03).png" title="Leonardo da Vinci's Self Supporting Bridge">
            </label>

            <label>
              <img src="img\permiablepavement(ce04).png" title="Permiable Pavement">
            </label>

            <label>
              <img src="img\thefalkrikwheel(ce05).png" title="The Falkrik Wheel">
            </label>



          </div><!--Row Ends-->

        </div><!--Civil Engineering-->

      </div><!--tab content End-->
    </div><!--panel body Ends-->
  </div><!--panel-primary Ends-->
</div><!--col-sm-12 Ends-->
  </div><!-- Row Ends-->
</div><!--Container Ends-->
</section><!--section Ends-->


<section>
  <div class="container">
    <div class="row">
      <center>
        <h2 class="form-details">Submit Your Vote</h2>
        <h4 class="form-details">Fill Details Before Submit your Vote</h4>
      </center>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="form-style-5">

          <fieldset>
          <legend></span> Voter Info</legend>
          <input type="text" name="Name" placeholder="Your FullName *" required>
          <input type="text" name="Number" placeholder="Your Contact Number *"  required>

          </fieldset>
          <input type="submit" name="Submit" value="Vote"/>
    </form>
      </div>
    </div>
  </div>
</section>

<!--Footer Section-->
<section id="foot">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <a href="loginpage.php"><h5 class="text-center">Team Member :- Pradhumansinh Padhiyar, Naitik Raval, Sunil Chaudhary, Pragati Patel, Hemani Patel</h5></a>
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
