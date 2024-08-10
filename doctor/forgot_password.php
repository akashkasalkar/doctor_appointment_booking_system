<?php include '../dbconn.php';
    include "../email.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>VISION CARE</title>
	

	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
	<div id="back-to-home">
		<a href="../index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			
				<span style="color: white"><i class="fa fa-gg"></i></span>
				<span style="color: white">VISION CARE</span>
			
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Forgot Password</h4>
	<form method="post" name="login">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Enter Registered Email ID" required="true" name="email">
		</div>

		<!-- <div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" required="true">
		</div> -->

		
		<input type="submit" class="btn btn-primary" name="submit" value="Reset Password">
	</form>
	<hr />
	<!-- <a href="signup.php">Signup/Registration</a> -->
</div><!-- #login-form -->
<?php 
				session_start();
				if (isset($_POST['submit'])) {
					$email=$_POST['email'];
                    $user_password=rand(1000,9999);
				
					$user_type="Doctor";

						 $sql = "select * from user 
                         where user_email='$email' and user_type='$user_type'";  
						$result = mysqli_query($con, $sql);  
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
						$count = mysqli_num_rows($result);  
						
						if ($count==1) {

                            $update_pass_qry = "UPDATE `user` SET user_password='$user_password',pass_change_status='0'
                            where user_email='$email'";

                            $rest_exc = mysqli_query($con,$update_pass_qry);

                            if($rest_exc){
                                $msg="your new password is <br/>, ";
                                $msg.="login to VISION CARE <br/> ";
                                $msg.="Username : $email ";
                                $msg.="<br />Password : $password";
                                phpmailsend($email, 'New Password for Vision Care', $msg);

                                echo "<script>alert('Your new password sent to your email.')
                                location='./login.php'
                                </script>";
                            }
							
							
						}
						else
						{
							echo "<script>alert('email wrong.')</script>";
						}
					
					
				}
			?>



	</div><!-- .simple-page-wrap -->
</body>
</html>