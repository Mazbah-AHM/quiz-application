
<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:Student.php");
    }
    else
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        include_once 'database.php';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mind Fizz Quiz</title>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
   
    <style type="text/css">
        body {
            width: 100%;
            background: url(image/2384075.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .block {
  display: block;
  width: 12%;
  border: none;
  background-color: yellowgreen;
  color: black;
  padding: 14px 28px;
  font-size: 30px;
  cursor: pointer;
  text-align: center;
  
}
.navbar {
      overflow: hidden;
      background-color: #333;
      border: 1px solid green;
      align-content: center;
    }

    .navbar a {
      float: left;
      font-size: 26px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-weight: bolder;
    }


    .navbar a:hover {
      background-color: red;
      cursor: pointer;
    }

    </style>
  
   
    
</head>

<body>
    <center>
        <div class="index">
           
</br>
            <nav class="navbar">
      

        <div class="container-fluid">
        <a class="navbar-brand" href="startQuiz.php"><b>All Quizes</b></a>
        </div>
        <div class="container-fluid">
        <a class="navbar-brand" href="studentrank.php"><b>Ranking</b></a>
        </div>
        <div class="navbar a">
        <a class="navbar-brand" href="index.php"><b>Logout</b></a>
        </div>
            </nav>
            <h1  style="color:black;"> Mind Fizz Quiz </h1>
            <h2  style="color:black;"> Welcome To Student Page </h2>
            

          
          
        

        </div>
    </center>
</body>

</html>