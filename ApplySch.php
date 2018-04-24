
<!DOCTYPE html>
<html>
<head>
	<title>apply for scholarship</title>
  <link rel="stylesheet" href="ApplySch.css">
</head>
<body>
  <button class="back" onclick="location.href='studenthome.php'">◄</button>
   <h1> Check qualification for scholarships </h1>
   <h2> Select the scholarship type you want to check qualification for, then click submit button. </h2><br><br>
   <form action="" method = "post">
      <input type="radio" class="option-input radio" name="scholarship_type" value="A"> <label>ทุนเรียนดี</label><br><br>
      <input type="radio" class="option-input radio" name="scholarship_type" value="B"><label>ทุนอุดหนุนการศึกษา</label><br><br><br><br><br>
      <!-- <input type="radio" name="scholarship type" value="C"> ทุนการศึกษาจากหน่วยงานภายนอก<br> -->
      <input class="button" type = "submit" name = "submit"> <br>
   </form>

</body></html>


<?php
   include "session.php";
   $dbname = 'regcu';
   if(!mysqli_select_db($db, $dbname)){
   $output = "Unable to locate " . $dbname . "database :(" ;
   include 'output.html.php';
   exit();
   }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   		if(isset($_POST['submit'])){
   			$type = $_POST['scholarship_type']	;
   		}
   		if($type = "A"){
   			$query1 = 'select * from excellent_academic_sch    where sch_year = "2017";';
   			$gradeOK = mysqli_query($db, $query1) ;
   			if(!$gradeOK){
   				$error = "cannot calc grade";
   				include "error.html.php";
   				exit();
   			}
   			$sch = mysqli_fetch_array($gradeOK);
   			$needGrade = $sch['min_GPA']; 
   			$query2 = 'select sum(E.grade * C.credits) / sum(C.credits) as gpax
   	 			from enroll E, course C 
    			where E.grade is not null and E.cid = C.cid and E.sid = '.$user_check.';';

   			$gradeOKK  = mysqli_query($db,$query2);
   			if(!$gradeOKK){
   				$error = 'cannot adfadf';
   				include "error.html.php";
   				exit();
   			}
   			$result2 = mysqli_fetch_array($gradeOKK);
   			$myGrade = $result2['gpax'];
   			$query4 = "select conduct_score from student where sid = ".$user_check.';';
   			$result04 = mysqli_query($db,$query4);
   			if(!$result04){
   				$error = 'canno fetch conduct score';
   				include "error.html.php";
   				exit();
   			} 

   			$my_conduct_score = mysqli_fetch_array($result04)['conduct_score']; 
   			$query3 = 'call calc_yearly_income('.$user_check.');';
   			$income = mysqli_query($db,$query3);
   			if(!$income){
   				$error = 'cannot fetch income';
   				include "error.html.php";
   				exit();
   			}
   			$result3 = mysqli_fetch_array($income);
   			$myIncome = $result3['total_income'];

   			if($myGrade >= $sch['min_GPA'] and
   				$my_conduct_score>= $sch['min_conduct_score']
   				and $myIncome <= $sch['max_family_income']){
               echo '<script language = "javascript">';
                echo 'alert ("You can apply for this scholarship! contact student association office for more information.")';
                echo '</script>';
   			}else{
                echo '<script language = "javascript">';
                echo 'alert ("You dont have what it take to apply for this scholarship. D: ")';
                echo '</script>';
   			}
   			exit();
   		}
   		if($type = "B"){
   			$query1 = 'select * from     where sch_year = "2017";';
   		}
   }
?>