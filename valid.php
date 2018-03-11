<?php
include('config.php');
$roll=$_POST['roll'];
$pass=$_POST['password'];
	if(isset($_POST['form_submit'])){

		if(empty($roll) || empty($pass)){
			header("location:index.html");
			echo"<script> document.getElementById(\"error\").innerHTML=\"ENTER CORRECT USER ROLLNO ,PASSWORD;\"</script>";
			echo 'console.log("de")';
		}
		else{

			$sql="SELECT id FROM `libs` WHERE rollno=101514";						//fetch id
			$id=mysqli_query($conn,$sql);
		    $my_id_array=mysqli_fetch_assoc($id);
		    $idd=$my_id_array['id'];
		    session_start();


		    $sql="SELECT pasword FROM `libs` WHERE rollno=101514";					//fetch password
			$ps=mysqli_query($conn,$sql);
		    $my_passwrd_array=mysqli_fetch_assoc($ps);
		    $password=$my_passwrd_array['pasword'];

		    if($password==$pass){
		    	$_SESSION['id'] = $idd;
		        header("location:home.html");
		    	echo "<script>alert('hello');</script>";
		        
		    	// echo "hell";
		    }
		    else{
		    	header("location:index.html");
		    	alert("User password or rollno incorrect");
		    	//echo "heref";
		    }
		}
	    
	}
?>