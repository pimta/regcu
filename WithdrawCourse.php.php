<html>
	<head></head>
	<body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>select semester and year</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>YEAR  :</label>
                  <input type = "number" value="2017" min="2000" max="2018" name = "year" class = "box" /><br><br>
               
                  <label>SEMESTER  :</label>
                  <br><br>
                  <label> ภาคต้น </label><input type = "radio" name = "semester" class = "box" value="1" /><br/><br />
                  <label> ภาคปลาย </label><input checked type = "radio" name = "semester" class = "box" value="2" /><br/><br />
                  <label> ภาคฤดูร้อน </label><input type = "radio" name = "semester" class = "box" value="3" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
              
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
<?php
//showEnrolledCourse.php
	include "session.php";
	$dbname = 'regcu';
	if(!mysqli_select_db($db, $dbname)){
	$output = "Unable to locate " . $dbname . "database :(" ;
	include 'output.html.php';
	exit();
	}
	if(isset($_POST['semester']) and isset($_POST['year'])){
	$SEM = $_POST['semester'];
	$YEAR = $_POST['year'];
	$query = "SELECT S.cid, C.cname, C.credits, T.tname FROM section S, course C, teacher T, enroll E WHERE S.cid = E.cid and E.cid = C.cid  and E.sec_id = S.sec_id and T.tid = S.tid and S.sem = " .$SEM." and S.yearr = ".$YEAR. ' and E.sid = "' . $user_check . '";';
	$result = mysqli_query($db, $query);
	if(!$result){
		$error = "Error fetching";
		include 'error.html.php';
		exit();
	}
	
	include "showEnrolledCourse.html.php";

	}

?>