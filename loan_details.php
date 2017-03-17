<?php
session_start();

?>
<?php
include_once 'connection.php';
?>
<!DOCTYPE html>
<html>
<title>Personal Information System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  <!--h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;-->
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
  }  
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }

html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" class="w3-light-grey">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Personal Information System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#usertemplate.php">HOME</a></li>
		<li><a href="#myModal" data-toggle="modal">Sign up</a></li>       
		<li><a href="pisnewhome.php">LOGOUT</a></li>
		
      </ul>
    </div>
  </div>
</nav>
<!-- Top container -->
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
  <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-right">Logo</span>
</div>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidenav"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="images/team/fpo_avatar.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8">
      <span>Welcome, <strong><?php echo $_SESSION["uname"]; ?></strong></span><br>
      <!--<a href="#" class="w3-hover-none w3-hover-text-red w3-show-inline-block"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-hover-none w3-hover-text-green w3-show-inline-block"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-hover-none w3-hover-text-blue w3-show-inline-block"><i class="fa fa-cog"></i></a>-->
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu</h5>
  </div>
  <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>  
	<li><a href="usertemplate.php" class="w3-padding" ><span class="glyphicon glyphicon-edit"></span>Dashboard</a></li>
	<li><a href="binfo.php" class="w3-padding" ><span class="glyphicon glyphicon-edit"></span>Basic Information</a></li>
  <li><a href="#qualifications" class="w3-padding" ><span class="glyphicon glyphicon-file"></span>Qualifications </a></li>
  <li><a href="#dependents" class="w3-padding" ><i class="fa fa-users fa-fw"></i>Dependents</a></li>
  <li><a href="#emergenceyconatcts" class="w3-padding" ><span class="glyphicon glyphicon-bullhorn"></span>Emergency Contacts</a></li>
  <li><a href="#salary" class="w3-padding" ><i class="fa fa-diamond fa-fw"></i>Salary</a></li>
  <li><a href="loan_details.php" class="w3-padding" > <span class="glyphicon glyphicon-road"></span>Loan</a></li>
  <a href="#subordinates" class="w3-padding" ><span class="glyphicon glyphicon-picture"></span>Subordinates</a>
  </nav>


<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>EMPLOYEE Loan Detail</b></h5>
  </header>

<form action="" method="post">
<div style="margin-left:5%" id="loan_details.php">
<table style="margin-left10%;width:500px;">
<tbody>
<link rel="stylesheet" type="text/css" href="style.css">
<tr>
<td>Loan Type<label style="color:#FF0000;">*</label></td>
<td><input type="text" name="loantype" required></td>
</tr>
<tr>
<td>Loan A/C no.<label style="color:#FF0000;">*</label></td>
<td><input type="text" name="accountno" required></td>
</tr>
<tr>
<td>Letter No<label style="color:#FF0000;">*</label></td>
<td><input type ="text" name="letterno"  required ></td>
</tr>
<tr>
<td>Sanction Date<label style="color:#FF0000;">*</label></td>
<td><input type ="date" name="sanctiondate" ></td>
</tr>
<tr>
<td>Sanction Amount<label style="color:#FF0000;">*</label></td>
<td><input type="text" name="sanctionamount" required ></td>
</tr>
<tr>
<td>Return Date<label style="color:#FF0000;">*</label></td>
<td><input type="date" name="returndate" ></td>
</tr>
<td>Remark<label style="color:#FF0000;">*</label></td>
<td><input type="text" name="remark"required></td><br></br>
</tr>
<tr style="text-align:center">
<td colspan="2"><input id="button" type="submit" name="submit" value="SUBMIT"></td>
</tr>
</tbody>
</div>
</form>
  </div>
  </div>
	
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" role="dialog">
		<div class="modal-dialog">
    
			 
		     </div>
     </div>
	 <!-- Modal 2-->
	 <div id="myModal" class="modal fade"  role="dialog">
		<div class="modal-dialog">
    
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">×</button>		
					<h4>REGISTER HERE</h4>
				</div>
				<div class="modal-body">
					 <form id="main-signup-form" onsubmit="return valid()" autocomplete="on" name="data" method="post" action="signup.php">
							<div class="form-group">
                                 <b> IC NO.</b><font color="red">*</font> <input type="text" name="icno"  class="form-control" placeholder="IC No." required/>
                               </div> 
							<div class="form-group">
                                 <b> User Name</b><font color="red">*</font> <input type="text" name="uname"  class="form-control" placeholder="User Name" required/>
                               </div> 
								<div class="form-group">
                                  <b> Password</b><font color="red">*</font> <input type="password" name="psw" id="psw" class="form-control" placeholder="Password" required/>
                                </div>
		
		</div>
	</div>
	</div>
	</div>

 


<script>
// Get the Sidenav
var mySidenav = document.getElementById("mySidenav");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidenav, and add overlay effect
function w3_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidenav.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidenav with the close button
function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
}

</script>

</body>
</html>

