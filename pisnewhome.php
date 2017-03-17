<?php
session_start();
?>
<?php
$servername="127.0.0.1";
$username="root";
$password="";
$database="drdo";
          
$conn= new mysqli($servername,$username,$password,$database); 
           
if ($conn->connect_error) 
{ 
            
	die("Could not connect: " . $conn->connect_error); 
} 
else
{
	if(isset($_REQUEST["submit"]))
                {
//				require_once("config/connection.php");
					$user=$_REQUEST["user"];
					$uname=$_REQUEST["uname"];
					$psw=$_REQUEST["psw"];
             
					if($user=="user")
					{
					$res=$conn->query("SELECT * FROM employee_login WHERE uname='$uname' && psw='$psw' && usertype='$user'");
					
						if($res->num_rows > 0)
						{
						$_SESSION["uname"]=$uname;
						header("location:usertemplate.php");
						}
						else
						{
                	     
						?>
						<script>
						alert('Wrong Username/Password!');
						</script>
						<?php
						}
			    	}
					else
					{
					$res=$conn->query("SELECT * FROM employee_login WHERE uname='$uname' && psw='$psw' && usertype='$admin'");
						if($res->num_rows > 0)
						{
						$_SESSION["uname"]=$uname;
						header("location:template1.php");
						}
						else
						{
						
						?>
						<script>
						alert('Wrong Username/Password!');
						</script>
						<?php
						}
					}
                
				}
}            
	
	
$conn->close();
?>     

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Information System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
  
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/ico/favicon.ico">

<style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 6px;      
      font-size: 20px;
      color: #111;
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
      -webkit-filter: grayscale(60%);
      filter: grayscale(60%); /* make all photos black and white */ 
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
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
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
  </style>
  <script type="text/javascript">
            function valid()
              {
              var testName =/^([a-z]|[A-Z]| )*$/;
              var num = /^[0-9]+$/;
              var validate_char= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

              if(document.data.pwd.value != document.data.pwd1.value)
              {
              alert ("password and confirm password are not equal ....");
              document.data.pwd.focus();
              document.data.pwd1.focus();
              return false;
              }

              else 
              return true;

              }
            function ShowHideDiv(chck) {
                var dvPassport = document.getElementById("dvPassport");
                dvPassport.style.display = chck.checked ? "block" : "none";
            }
          
           /* function Validate() {
                var password = document.getElementById("pwd").value;
                var confirmPassword = document.getElementById("pwd1").value;
                if (password != confirmPassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            }
            validate();*/
        </script>


</head>

<body  id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#myPage">Personal Information System</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a data-toggle="tab" href="#myPage">Home</a></li>
          <li><a data-toggle="tab" href="#about">About Us</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a data-toggle="modal" href="#myModal1"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a data-toggle="modal" href="#login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

  <img src="images/slider/img1.jpg" alt="image1" width="1350" height="500">   

<div id="about" class="container text-center">
  <h3>ABOUT US</h3>
    <br>
 <div class="row">
<div class="col-sm-12">
<p><h1>The Defence Research and Development Organisation(DRDO) is an agency of the Republic of India, charged with the military's research and development, headquartered in New Delhi, India.</h1></p>
It was formed in 1958 by the merger of the Technical Development Establishment and the Directorate of Technical Development and Production with the Defence Science Organisation. It is under the administrative control of the Ministry of Defence, Government of India.

With a network of 52 laboratories, which are engaged in developing defence technologies covering various fields, like aeronautics, armaments, electronics, land combat engineering, life sciences, materials, missiles, and naval systems, DRDO is India's largest and most diverse research organisation.
</div>
 </div>
  </div>	


<!-- Modal -->
	<div class="modal fade" id="login" role="dialog">
		<div class="modal-dialog">
    
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">×</button>		
					<h4><span class="glyphicon glyphicon-lock"></span> LOGIN</h4>
				</div>
		<div class="modal-body">
				<div class="login-form">
					<form id="main-login form" name="Login-form" method="post" action="#">
					
						<div class="form-group">
						<div class="radio">
                              <label>
                                    <input type="radio" name="user" id="optionsRadios1" value="user" checked><span class="glyphicon glyphicon-user"></span> User</label>
                     </div>
                     <div class="radio">
                               <label>
                                     <input type="radio" name="user" id="optionsRadios2" value="admin"><span class="glyphicon glyphicon-user"></span> Admin</label>
                     </div>
							 <b>Username</b><br>
							<input type="text" name="uname" class="form-control" id="uname" placeholder="username" required>
						</div>
						<div class="form-group">
							<b>Password</b><br>
							<input type="password" name="psw" class="form-control" id="psw" placeholder="password" required>
						</div>             
						<button type="submit" name="submit" class="btn btn-block">SUBMIT</button> 
						<button type="reset" class="btn btn-block">CLEAR</button>    			  
					   </form>
				</div>
		</div>      
		     </div>
    
		</div>
	</div>
	

<!--MODAL 2-->	
	<div id="myModal1" class="modal fade"  role="dialog">
		<div class="modal-dialog">
    
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">×</button>		
					<h4>REGISTER HERE</h4>
					<h5 style="color:white;">This registration is only for DRDO.</h5>
				</div>
				<div class="modal-body">
					 <form id="main-signup-form" onsubmit="return valid()" autocomplete="on" name="data" method="post" action="signup.php">
               <div class="form-group">                              
                <b> First Name </b><font color="red">*</font> <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                  <b> Middle Name </b> <input type="text" name="mname" class="form-control" placeholder="Middle Name"> 
                  <b> Last Name </b><font color="red">*</font> <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                  <b> Gender </b><font color="red">*</font><br>
                  <select name="gender" class="form-control" required >
                  <option value="1">Male</option>
                  <option value="female">Female</option>                                                        
                  </select>
                </div>
                                               <div class="form-group">                
                                                <b> Flat No. </b><font color="red">*</font><input type="text" name="flatno"  class="form-control" placeholder="Flat No." required/>                                        
                               </div>
                                               <div class="form-group">                
                                                <b> Email ID </b><font color="red">*</font><input type="email" name="emailid"  class="form-control" placeholder="Email Id." required/>                                        
                               </div>
                                                <div class="form-group">                
                                                <b> Mobile No. </b><font color="red">*</font><input type="tel" name="mobileno"  class="form-control" pattern="[0-9]{10}"  title="Ten digits code" placeholder="Mobile No." required/>                                        
                               </div>
                                               <div class="form-group">                
                                                <b> Landline No. </b><input type="tel" name="landlineno"  class="form-control" pattern="[0-9]{10}" placeholder="Landline No."/>                                        
                               </div>
                                               <div class="form-group">                
                                                <b> Intercom No. </b><input type="tel" name="intercomno"  class="form-control" placeholder="Intercom No."/>                                        
                               </div>
                               <div class="form-group">
                                 <b> Designation</b><font color="red">*</font> <input type="text" name="designation" class="form-control" placeholder="Designation" required/>
                               </div>
                               <div class="form-group">
                               <b> CATEGORY</b><font color="red">*</font> <br>
                   
                                                 <select name="category" class="form-control" required >
                                                     <option value="notselected">Select Value</option>
                                                           <option value="general">General</option>
                                                           <option value="sc">SC</option>
                                                           <option value="st">ST</option>  
                                                           <option value="others">Others</option>
                                                         </select>
                               </div>
                                               <div class="form-group">
                                 <b> Office/Department</b><font color="red">*</font> <input type="text" name="office" class="form-control" placeholder="Office/Department" required/>
                               </div>
                                               <div class="form-group">
                                 <b> Address</b> <input type="text" name="address" class="form-control" placeholder="Address" />
                               </div>
                                               <div class="form-group">
                                 <b> Contact No</b> <input type="text" name="contactno" class="form-control" placeholder="Contact No." />
                                                 <b> Extension</b> <input type="text" name="extension" class="form-control" placeholder="Extension"><em><span>(IF Any)</span></em>
                               </div>
                                               <div class="form-group">
                                 <input type="checkbox" id="chck" name="chck" onclick="ShowHideDiv(this)";> <b>Is Spouse A Goverment Officer?</b>
                               </div>
                                               <div class="form-group" id="dvPassport" style="display:none">
                                 <b> Spouse Name</b> <input type="text" name="spousename" id="spousename" class="form-control" placeholder="Spouse Name">
                               </div>
                                               <div class="form-group">
                                 <b> User Name</b><font color="red">*</font> <input type="text" name="uname"  class="form-control" placeholder="User Name" required/>
                               </div> 
								<div class="form-group">
                                  <b> Password</b><font color="red">*</font> <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required/>
                                </div>
								<div class="form-group">
                                  <b>Confirm Password</b><font color="red">*</font> <input type="password" name="pwd1" id="pwd1" class="form-control"onblur="confirmpassword(this.value)" placeholder="ConfirmPassword" required/>
                                </div>
								<div class="form-group">
								 <span> <font color="red">*</font><b>Mandatory filelds.</b></span>
								 <p><span><input type="checkbox" id="mfields "name="checkbox" value="check" required /><label for="checkbox">I agree the Terms And conditons.</label></span></p>                            
								  </div>
                  <input type="submit" class="btn btn-block" name="signup" value="signup">
								<button type="reset" class="btn btn-block">Clear</button>
                </form>

				</div>      
			</div>
    
		</div>
	</div>
    <script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
	<script src="js/toword.js"></script>
	<script src="js/fun.js"></script>

</body>
</html>