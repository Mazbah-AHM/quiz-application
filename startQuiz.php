<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:login.php");
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
    
    <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
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
                <h5 style="font-family: Noto Sans;">All Quizes </h5></center><br>
                
                    <input type="button" class="block"  onclick="location.href='playQuiz.php';" value="Back" /></p>
                    <div class="boxed">
                        <?php  
                        
                            $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                            echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                            <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</center></b></td><td><center><b>Action</b></center></td></tr>';
                            $c=1;
                            while($row = mysqli_fetch_array($result)) {
                                $title = $row['title'];
                                $total = $row['total'];
                                $sahi = $row['sahi'];
                                $eid = $row['eid'];
                            $q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
                            $rowcount=mysqli_num_rows($q12);	
                            if($rowcount == 0){
                                echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="welcome.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></center></td></tr>';
                            }
                            else
                            {
                            echo '<tr style="color:#99cc32"><td><center>'.$c++.'</center></td><td><center>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td><td><center><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="color:black;margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></center></td></tr>';
                            }
                            }
                            $c=0;
                            echo '</table></div></div>';
                        ?>
        
                      
            
        </div>
  


    

</body>

</html>