<?php
	include('session.php'); 
   	$role = $_SESSION['user_role'];
   	if(!isset($_SESSION['user_role']) | $_SESSION['user_role'] != 'student' ){
      	header("Location: login.php");
   	}

$query = 'select S.sid, SG.fee_amount 
from student S, student_group SG
where SG.group_id = S.group_id and S.enroll_year = SG.enroll_year and S.sid = "'. $user_check .'";';

$query2 = 'select * from pay_fee where sid = "'.$user_check.'";';

$result = mysqli_query($db, $query);
	if(!$result){
		$error = "Error fetching fee";
		include 'error.html.php';
		exit();
	}
$result2 = mysqli_query($db, $query2);
	if(!$result2){
		$error = "Error fetching payment history";
		include 'error.html.php';
		exit();
}
	
	while($row = mysqli_fetch_array($result)){
		$student[] = $row['fee_amount']; 	
	}
	include 'studentInfo.html.php';
?>








