<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0>
    <style> body {padding: 0; margin: 0;} </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/p5.js"></script>
    <script src="sketch.js"></script>
  </head>
  <body>
    <div id="sketch"></div>
    <form style="padding: 0% 25%" action="valid.php" method="post">
        <fieldset>
        <span id="error"></span>
        <p>ROLL :</p>  <INPUT id="i1" name='roll' type="number" />
        <p>PASSWORD :</p>  <INPUT id="i2" name='password' type="password" />
        <button name="form_submit" >Submit</button>

<?php
include('config.php');
$roll="";
$pass="";
$roll=$_POST['roll'];
$pass=$_POST['password'];
	if(isset($_POST['form_submit'])){
		if(!(empty($roll) || empty($pass))){
			$sql="SELECT id FROM `libs` WHERE rollno='$roll' and pasword='$pass'";						//fetch id
			$id=mysqli_query($conn,$sql);
		    $my_id_array=mysqli_fetch_assoc($id);
		    $idd=$my_id_array['id'];
		    session_start();

		    $sql="SELECT pasword FROM `libs` WHERE id='$idd' ";					//fetch password
			$ps=mysqli_query($conn,$sql);
		    $my_passwrd_array=mysqli_fetch_assoc($ps);
		    $password=$my_passwrd_array['pasword'];

		    if($password==$pass){
		    	$_SESSION['id'] = $idd;
		        header("location:home.html");
		    }
		    else{
		    	$count=0;
		    	$flag=0;
		    	$sql="select rollno from libs";
		    	$stored_roll=mysqli_query($conn,$sql);
		    	while($row=mysqli_fetch_array($stored_roll)){
		    		if(($roll==$row['rollno'])){
		    			$flag=1;
		    		}
		    		else{
		    			$count=1;
		    		}
		    	}
		    	if($flag==0){
		    			die("<span style='color:red' class='error'>No such user!</span>");			
		    	}
		    	else{
		    				die("<span style='color:red' class='error'>Incorrect password</span>");			
		    	}
		    }	
		}
		else{
			if(empty($roll)&& empty($pass)){
				die("<span style='color:red' class='error'>ENTER ROLLNO AND PASSWORD</span>");			
			}
			else if(empty($pass)){
				die("<span style='color:red' class='error'>ENTER PASSWORD</span>");			
			} 
			else {
				die("<span style='color:red' class='error'>ENTER ROLLNO </span>");			
			}

		}
	}

?>
        </fieldset>
    </form>
  </body>
</html>
