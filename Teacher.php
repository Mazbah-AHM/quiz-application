<?php
    include_once 'database.php';
    session_start();
    if(isset($_SESSION["email"]))
	{
		session_destroy();
    }
    
    $ref=@$_GET['q'];
    if(isset($_POST['submit']))
	{	
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = stripslashes($email);
        $email = addslashes($email);
        $password = stripslashes($password); 
        $password = addslashes($password);

        $email = mysqli_real_escape_string($con,$email);
        $password = mysqli_real_escape_string($con,$password);
        
        $result = mysqli_query($con,"SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            session_start();
            if(isset($_SESSION['email']))
            {
                session_unset();
            }
            $_SESSION["name"] = 'Admin';
            $_SESSION["key"] ='admin';
            $_SESSION["email"] = $email;
            header("location:dashboard.php?q=0");
        }
        else
        {
            echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
            header("refresh:0;url=Teacher.php");
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login | Find Fizz Quiz</title>
		
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
						<center> <h5 style="font-family: Noto Sans;">Login as Teacher </h5><h4 style="font-family: Noto Sans;" color="red;">Online Quiz System</h4></center><br>
							<form method="post" action="Teacher.php" enctype="multipart/form-data">
								<div class="form-group">
									<label style="font-size:20px;">Enter Your Email Id:</label></br>
									<input type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label style="font-size:20px;" class="fw">Enter Your Password:
										
									</label>
									<input type="password" name="password" class="form-control">
								</div> 
								<div class="form-group text-right">
			                    </br><button class="btn btn-primary btn-block" name="submit">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="registerteacher.php">Register</a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		
	
	</body>
</html>