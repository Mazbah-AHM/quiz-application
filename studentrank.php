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
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Mind Fizz Quiz</title>
   
    <link rel="stylesheet" href="css/form.css">
    <style type="text/css">
        body {
            width: 100%;
            background: url(image/2384075.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: sans-serif;
            margin-top: 40px;
        }
        .boxed {
  background-color: lightgrey;
  
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
border: 5px black;
padding: 10px;

}
table, th, td {
    border: 1px solid black;
  border-collapse: collapse;
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}
th, td {
  padding: 10px;
}

.block {
  display: block;
  width: 7%;
  border: 5px solid black;
  background-color: yellowgreen;
  color: black;
  padding: 10px 20px;
  font-size: 30px;
  cursor: pointer;
  text-align: center;
  
}
        
    </style>
</head>

<body>

            <center><h4 style="font-family: Noto Sans;">Mind Fizz Quiz</h4> 
                <h5 style="font-family: Noto Sans;">Scores of students </h5></center><br>
                
    <input type="button" class="block"  onclick="location.href='playQuiz.php';" value="Back" /></p>
                    <div class="boxed">
                    <?php
                        $q=mysqli_query($con,"SELECT * FROM rank ORDER BY score DESC " )or die('Error223');
                        echo  '<div class="panel title"><div class="table-responsive">
                        <table  >
                        <tr style="color:red"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>Email</b></center></td><td><center><b>Score</b></center></td></tr>';
                        $c=0;

                        while($row=mysqli_fetch_array($q) )
                        {
                            $e=$row['email'];
                            $s=$row['score'];
                            $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
                            while($row=mysqli_fetch_array($q12) )
                            {
                                $name=$row['name'];
                            }
                            $c++;
                            echo '<tr><td style="color:black"><center><b>'.$c.'</b></center></td><td><center>'.$name.'</center></td><td><center>'.$e.'</center></td><td><center>'.$s.'</center></td></tr>';
                        }
                        echo '</table></div></div>';
                    ?>
                     </div>
            
        </div>
    

</body>

</html>