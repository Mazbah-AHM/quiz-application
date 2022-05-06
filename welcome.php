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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Mind Fizz Quiz</title>
      
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
 
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
        .boxed  {
  background-color: lightgrey;
  width: 700px;
  border: 5px solid black;
  padding: 50px;
  margin: 20px;
  position:absolute;
  top:30%;
  left:38%;
  margin-top:-50px; 
  margin-left:-150px;
 
}
.navbar {
      overflow: hidden;
      background-color: #333;
      border: 1px solid green;
    }

    .navbar a {
      float: left;
      font-size: 16px;
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
<body >
    <nav class="navbar">
        <div class="container-fluid">
            
        <a class="navbar-brand" href="playQuiz.php"><b>Mind Fizz Quiz</b></a>
        </div>

     
       
        
        <div class="navbar a">
        <li <?php echo''; ?> > <a href="index.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
        </div>
        
            
           
       
        </div>
    </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="boxed" >

                <?php
                    if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) 
                    {
                        
                        $eid=@$_GET['eid'];
                        $sn=@$_GET['n'];
                        $total=@$_GET['t'];
                        $q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
                        echo '<div class="panel" style="margin:5%">';
                        while($row=mysqli_fetch_array($q) )
                        {
                            $qns=$row['qns'];
                            $qid=$row['qid'];
                            echo '<b style="font-size:25px;color:black;">Question &nbsp;'.$sn.'&nbsp;::<br /><br />'.$qns.'</b><br /><br />';
                        }
                        $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
                        echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
                        <br />';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $option=$row['option'];
                            $optionid=$row['optionid'];
                            echo'<input type="radio"  name="ans" value="'.$optionid.'">&nbsp;'.$option.'<br /><br />';
                        }
                        echo'<br /><button type="submit" style="font-size:20px;padding:7px;color:red;" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true" ></span>&nbsp;Submit</button></form></div>';
                    }
                    

                    if(@$_GET['q']== 'result' && @$_GET['eid']) 
                    {
                        $eid=@$_GET['eid'];
                        $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
                        echo  '<div class="panel">
                        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                        while($row=mysqli_fetch_array($q) )
                        {
                            $s=$row['score'];
                            $w=$row['wrong'];
                            $r=$row['sahi'];
                            $qa=$row['level'];
                            echo '<tr style="color:black"><td>Total Questions</td><td>'.$qa.'</td></tr>
                                <tr style="color:green"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
                                <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
                                <tr style="color:black"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
                        }
                        
                        echo '</table></div>';
                    }
                ?>
            </div>
             

               
</body>
</html>