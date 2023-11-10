<body>
<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_login']))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selAdmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$rowAdmin=$conn->query($selAdmin);
	
    $selWorkerRegistration="select * from tbl_worker where worker_email='$email' and worker_password='$password'";
	$rowWorkerRegistration=$conn->query($selWorkerRegistration);
	
	$selUserRegistration="select * from tbl_user where user_email='$email' and user_password='$password'";
	$rowUserRegistration=$conn->query($selUserRegistration);
	
    $selMarketRegistration="select * from tbl_Market where Market_email='$email' and Market_password='$password'";
	$rowMarketRegistration=$conn->query($selMarketRegistration);
	 
	   if($Admin=$rowAdmin->fetch_assoc())
	   {
		    $_SESSION["aid"]=$Admin["admin_id"];
			$_SESSION["aname"]=$Admin["admin_name"];
			
			header("location:../Admin/Homepage.php");
	   }
	      else if($Worker=$rowWorkerRegistration->fetch_assoc())
		   {
			$_SESSION["wid"]=$Worker["worker_id"];
			$_SESSION["wname"]=$Worker["worker_name"];
			 
			  header("location:../Worker/Homepage.php");
		 }
		    else if($user=$rowUserRegistration->fetch_assoc())
		   {
			$_SESSION["uid"]=$user["user_id"];
			$_SESSION["uname"]=$user["user_name"];
			 
			  header("location:../User/Homepage.php");
			
		 }
		  else if($market=$rowMarketRegistration->fetch_assoc())
		   {
			$_SESSION["mid"]=$market["market_id"];
			$_SESSION["mname"]=$market["market_name"];
			 
			  header("location:../Market/Homepage.php");
		   }
		    
			 else{
			?>
                 <script>
				 alert("Invalid Login!!");
				 window.location="Login.php";
				 
				 </script>
				 <?php
			 }
}
?>



<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../Assets/Template/Login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Rubber Hub</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="#" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="email" class="form-control" placeholder="Email" name="txt_email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name="txt_password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btn_login" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">								 
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="../Index.html" style="color: #fff">Back To Home</a>
								</div>
	            </div>
	          </form>
	        
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Template/Login/js/jquery.min.js"></script>
  <script src="../Assets/Template/Login/js/popper.js"></script>
  <script src="../Assets/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Login/js/main.js"></script>

	</body>
</html>

