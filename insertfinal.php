<?php


$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$religion = $_POST['religion'];
$mystate = $_POST['mystate'];

if(!empty($name)||!empty($email)||!empty($gender)||!empty($dob)||!empty($religion)||!empty($mystate))
	{
	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="student_db";
	
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	
	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().'mysqli_connect_error());
		
	
	}
	else
	{
		$SELECT = "SELECT email From student_db Where email=? Limit 1";
		$INSERT = "INSERT INTO student_db(name,email,gender,dob,religion,mystate) values (?,?,?,?,?,?)";
		
		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum=$stmt->num_rows;
		
		if($rnum==0)
		{
			$stmt->close();
			$stmt= $conn->prepare($INSERT);
			$stmt->bind_param("ssssss",$name,$email,$gender,$dob,$religion,$mystate);
			$stmt->execute();
			echo "New record inserted successfully";
			
			
		}
		else
		{
			echo "Someone already inserted using this email";
			
		}			
		$stmt->close();
		$conn->close();
	}
	}
else
	{
	echo "All fields are required";
	die();
	}
	
?>
