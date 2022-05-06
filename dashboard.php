<?php
    include_once 'database.php';
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("location:Teacher.php");
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
    <title>Dashboard | Mind Fizz Quiz</title>
     
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
    .boxed {
  background-color: lightyellow;
  
position: absolute;
left: 50%;
top: 50%;
transform: translate(-50%, -50%);
border: 5px solid black;
padding: auto;

}
.boxed1 {
  background-color: lightgreen;
  
position: absolute;
left: 30%;
top: 10%;

border: 5px solid black;
padding: 50px;
margin: 50px;

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
    </style>
</head>

<body>
    
<nav class="navbar">
<div class="container-fluid">
                   <?php if(@$_GET['q']==0)  ?><a href="dashboard.php?q=0">Home</a>
                    <?php if(@$_GET['q']==1) ?><a href="dashboard.php?q=1">User</a>
                    <?php if(@$_GET['q']==2) ?><a href="dashboard.php?q=2">Ranking</a>
                      <?php if(@$_GET['q']==4 || @$_GET['q']==5) ?>
                    <a href="dashboard.php?q=4">Add Quiz</a>
                    <a href="dashboard.php?q=5">Remove Quiz</a>
       
                     <?php echo''; ?> <a href="index.php?q=dashboard.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a>
              
        </div>
    </nav>

    <div class="boxed">
                <?php if(@$_GET['q']==0)
                {
                   echo "<h1 style=padding:20px;font-size:50px;color:black; > Mind Fizz Quiz </h1>
                   <h2  style=padding:20px;font-size:40px;color:black;> Welcome To Teacher Page </h2>";
					
                }
                

                if(@$_GET['q']== 2) 
                {
                    $q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
                    echo  '<div class="row"><span class="title1" style="padding:20px;font-size:30px;color:black;"><b>Student Rank</b></span><br /><br />
                     <fieldset>
                    <table class="table table-striped title1" >
                    <tr style="color:red;"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>Score</b></center></td></tr>';
                    $c=0;
                    while($row=mysqli_fetch_array($q) )
                    {
                        $e=$row['email'];
                        $s=$row['score'];
                        $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
                        while($row=mysqli_fetch_array($q12) )
                        {
                            $name=$row['name'];
                            $college=$row['college'];
                        }
                        $c++;
                        echo '<tr><td style="color:blue"><center><b>'.$c.'</b></center></td><td><center>'.$e.'</center></td><td><center>'.$s.'</center></td>';
                    }
                    echo '</table></div></div>';
                }
                ?>
   
                <?php 
                    if(@$_GET['q']==1) 
                    {
                        $result = mysqli_query($con,"SELECT * FROM user") or die('Error');
                        echo  '<div class="row"><span class="title1" style="padding:20px;font-size:30px;color:black;text-align:center;"><b>Registered Student</b></span><br /><br />
                        <fieldset><table class="table table-striped title1">
                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Name</b></center></td><td><center><b>College</b></center></td><td><center><b>Email</b></center></td><td><center><b>Action</b></center></td></tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) 
                        {
                            $name = $row['name'];
                            $email = $row['email'];
                            $college = $row['college'];
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$name.'</center></td><td><center>'.$college.'</center></td><td><center>'.$email.'</center></td><td><center><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>

                <?php
                    if(@$_GET['q']==4 && !(@$_GET['step']) ) 
                    {
                        echo '<div class="row"><span class="title1" style="padding:20px;font-size:30px;color:black;"><b>Enter Quiz Details</b></span><br /><br />
                           
                        <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
                        <fieldset>
                                
                                   
                                        <input id="name" name="name" style="font-size:20px;padding:5px;" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                                        </br>
                                        </br>
                               
                                        <input id="total" name="total" style="font-size:20px;padding:5px;" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                                        </br>
                                        </br>
                              
                                        <input id="right" name="right" style="font-size:20px;padding:5px;" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                                        </br>
                                        </br>
                                        <input id="wrong" name="wrong" style="font-size:20px;padding:5px;" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
                                        </br>
                                        </br>
                                        <input  type="submit"  class="btn btn-primary" value="Submit"style="font-size:20px;padding:5px;color:red;"class="btn btn-primary"/>
                                        </br>
                                        </br>
                            
                        </form>';
                    }
                ?>

                
                <?php 
                    if(@$_GET['q']==5) 
                    {
                        $result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                        echo  '<div class="row"><span class="title1" style="padding:20px;font-size:30px;color:black;"><b>Remove Quiz</b></span><br /><br />
                         <fieldset><table class="table table-striped title1">
                        <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</b></center></td><td><center><b>Action</b></center></td></tr>';
                        $c=1;
                        while($row = mysqli_fetch_array($result)) {
                            $title = $row['title'];
                            $total = $row['total'];
                            $sahi = $row['sahi'];
                            $eid = $row['eid'];
                            echo '<tr><td><center>'.$c++.'</center></td><td><center>'.$title.'</center></td><td><center>'.$total.'</center></td><td><center>'.$sahi*$total.'</center></td>
                            <td><center><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red;color:black"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></center></td></tr>';
                        }
                        $c=0;
                        echo '</table></div></div>';
                    }
                ?>
                 </div>
            </div>
        </div>
    </div>
   
    <?php
                    if(@$_GET['q']==4 && (@$_GET['step'])==2 ) 
                    {
                        echo '
                        <div class="boxed1"> 
                        <div class="row">
                        <span class="title1" style="font-size:30px;"><b>Enter Question Details</b></span><br /><br />
                        <form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
                        <fieldset>
                        ';
                
                        for($i=1;$i<=@$_GET['n'];$i++)
                        {
                            echo '<b style="font-size:20px;padding:5px;">Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
                                        <div class="col-md-12">
                                            <textarea rows="4" cols="35" name="qns'.$i.'" class="form-control" style="font-size:20px;padding:5px;" placeholder="Write question number '.$i.' here..."></textarea>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'1"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'1" name="'.$i.'1" style="font-size:20px;padding:5px;" placeholder="Enter option a" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'2"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'2" name="'.$i.'2" style="font-size:20px;padding:5px;" placeholder="Enter option b" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'3"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'3" name="'.$i.'3" style="font-size:20px;padding:5px;" placeholder="Enter option c" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="'.$i.'4"></label>  
                                        <div class="col-md-12">
                                            <input id="'.$i.'4" name="'.$i.'4" style="font-size:20px;padding:5px;" placeholder="Enter option d" class="form-control input-md" type="text">
                                        </div>
                                    </div>
                                    <br />
                                    <b>Correct answer</b>:<br />
                                    <select id="ans'.$i.'" name="ans'.$i.'" style="font-size:20px;padding:5px;" placeholder="Choose correct answer " class="form-control input-md" >
                                    <option value="a">Select answer for question '.$i.'</option>
                                    <option value="a"> option a</option>
                                    <option value="b"> option b</option>
                                    <option value="c"> option c</option>
                                    <option value="d"> option d</option> </select><br /><br />'; 
                        }
                        echo '<div class="form-group">
                                <label class="col-md-12 control-label" for=""></label>
                                <div class="col-md-12"> 
                                    <input  type="submit" style="color:red;font-size:20px;padding:5px;" class="btn btn-primary"  "value="Submit" class="btn btn-primary"/>
                                </div>
                              </div>

                        </fieldset>
                        </form></div></div>';
                    }
                ?>
  

</body>
</html>
