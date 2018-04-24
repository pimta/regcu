<?php
	/* Escape HTML for output*/
	function escape($html){
	  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
	}
	

	include('session.php'); 
   	$role = $_SESSION['user_role'];
   	if(!isset($_SESSION['user_role']) | $_SESSION['user_role'] != 'student' ){
      	header("Location: login.php");
   	}
   	$SEM = '2';
	$YEAR = '2017';
	
	if (isset($_GET["cid"]) AND isset($_GET["sec"])) {
	  try {
	  
	    $cid = $_GET["cid"];
	    $sec_id = $_GET["sec"];

	    $query = "UPDATE Enroll SET grade=-1 WHERE sid=".$user_check." AND cid = " .$cid. " AND yearr = ".$YEAR." AND sem = ".$SEM." ;";
	    $result = mysqli_query($db, $query);
	    if(!$result){
	    	$error = "Error updating grade to -1" ;
	    	include 'error.html.php';
	    	exit();
	    }
	  } catch(PDOException $error) {
	    echo $sql . "<br>" . $error->getMessage();
	  }
	}

	$query = "SELECT S.cid,C.cid,E.sec_id, C.cname, C.credits FROM section S, course C, teacher T, enroll E WHERE S.cid = E.cid and E.cid = C.cid  and E.sec_id = S.sec_id and T.tid = S.tid and S.sem = " .$SEM." and S.yearr = ".$YEAR. ' and E.sid = "' . $user_check . '" and (E.grade!=-1 or E.grade IS NULL) ;';
	//echo $query;
	$result = mysqli_query($db, $query);
	if(!$result){
		$error = "Error fetching";
		include 'error.html.php';
		exit();
	}
	include "withdraw.html.php" ;
?>
