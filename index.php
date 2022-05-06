<?php
  
require('database.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mind Fizz Quiz</title>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="shortcut icon" type="image/png" href="image/logo.png" />
        <style type="text/css">
            
            body {
                width: 100%;
                background: url(image/2384075.jpg) ;
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

            .block {
  display: block;
  width: 20%;
  border: 5px solid black;
  background-color: darkred;
  color: whitesmoke;
  padding: 14px 28px;
  font-size: 30px;
  cursor: pointer;
  text-align: center;
  
}
   
        </style>
    </head>
    <body>
        <center>
            <div class="index">
                <h1 style="color:black;"> Mind Fizz Quiz </h1>
                
                <input type="button" class="block" onclick="location.href='Teacher.php';" value="Teacher" /> </br>
                <input type="button" class="block" onclick="location.href='Student.php';" value="Student" />
                

                
            </div>
        </center>
   


    </body>
</html>