<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

	
		$str="SELECT email from admin WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
            header("refresh:0;url=registerteacher.php");
        }
		else
		{
            $str="insert into admin set email='$email',password='$password'";
			if((mysqli_query($con,$str))){	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header('location: Teacher.php?q=1');
			}
		}
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Find Fizz Quiz</title>
	
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/2384075.jpg) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">Register as Teacher </h5><h4 style="font-family: Noto Sans;">Mind Fizz Quiz</h4></center><br>
							<form method="post" action="registerteacher.php" enctype="multipart/form-data">
                               
								<div class="form-group">
									<label style="font-size:20px;">Enter Your Email Id:</label></br>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label style="font-size:20px;">Enter Your Password:</label></br>
									<input type="password" name="password" class="form-control" required />
                            
                                
								<div class="form-group text-right">
								</br><button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="Teacher.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		
	</body>
</html>