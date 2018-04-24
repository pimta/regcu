<?php
$servername = "localhost";
$username = "root";
$password = "root";

# connect to MySQL server
$link = mysqli_connect($servername, $username, $password);
if (!$link){
	$output = 'Unable to connect to database server :(';
	include 'output.html.php';
	exit();
}

# change character set to utf8
if (!mysqli_set_charset($link, 'utf8')){
	$output = "Unable to set database connection enconding :( ";
	include 'output.html.php';
	exit();
}

# select database
$dbname = 'regcu';
if(!mysqli_select_db($link, $dbname)){
	$output = "Unable to locate " . $dbname . "database :(" ;
	include 'output.html.php';
	exit();
}

$query = 'SELECT S.sid, S.nat_id, S.fname, S.lname, D.dep_name 		FROM student S, department D 
		WHERE S.sid = '. $_GET['sid'] .' and S.dep_id = D.dep_id ; ' ;
$result = mysqli_query($link, $query);
	if(!$result){
		$error = "Error fetching student";
		include 'error.html.php';
		exit();
	}
	while($row = mysqli_fetch_array($result)){
		$student = $result;
		include 'studentInfo.html.php';

	}
?>