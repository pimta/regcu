
<!DOCTYPE html>
<html>
<head>
	<title>Search Courses</title>
	<link rel = "stylesheet" href = "tablestyle.css">
		<link rel = "stylesheet" href="searchCourse.css">
		 <link rel="stylesheet" href="backbutton.css">
</head>
<body>
	<button class="back" onclick="location.href='studenthome.php'">◄</button>
	<h1>Search Courses</h1>
	<div align = "center">
         <div class="form"  align = "left">
            <div class="formtitle"><b>select semester and year</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>YEAR  :</label>
                  <input type = "number" value="2017" min="2000" max="2018" name = "year" class = "box" /><br><br>
               
                  <label>SEMESTER  :&#9;</label>
                  
                  &emsp;<input type = "radio" name = "semester" class = "box" value="1" /><label> ภาคต้น </label>
                  &emsp;<input type = "radio" name = "semester" class = "box" value="2" /><label> ภาคปลาย </label>
                  &emsp;<input type = "radio" name = "semester" class = "box" value="3" /><label> ภาคฤดูร้อน </label>
                  <br><br>
                  <label>Course ID :</label>
                  <input type="text" name="cid" class="box" />
      			<br><br>
      			  <label>Course Name : </label>
      			  <input type="text" name="cname"  />
                  <br><br>
                  <label>Teacher Name : </label>
      			  <input type="text" name="tname"  />
                  <br><br>
      			  <input class="submitbutton" type = "submit" value = " Show "/>
               </form>
              
					
            </div>
				
         </div>
			
      </div>

</body>
</html>


<?php
	
	include('session.php');
	if(isset($_POST['semester']) and isset($_POST['year']) ){
	$SEM = $_POST['semester'];
	$YEAR = $_POST['year'];
	$query = "SELECT S.cid, S.sec_id, C.cname, C.credits, T.tname 
			FROM section S, course C, teacher T 
			WHERE S.cid = C.cid and T.tid = S.tid and S.sem = " .$SEM." and S.yearr = ".$YEAR. 
				(isset($_POST['cid']) ? (" and C.cid LIKE '".$_POST['cid']."%' ") : " ").
				(isset($_POST['cname']) ? " and C.cname LIKE '%".$_POST['cname']."%'" : " ").
				(isset($_POST['tname']) ? " and T.tname LIKE '%".$_POST['tname']."%'" : " ").
				';';
	$result = mysqli_query($db,$query);
	if(!$result){
		$error = "Error fetching";
		include 'error.html.php';
		exit();
	}
	include "showSearchedCourse.html.php";

}
?>