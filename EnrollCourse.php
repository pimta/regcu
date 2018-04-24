<!DOCTYPE html>
<html>
	<head>
      <link rel="stylesheet" href="form.css">
      <link rel="stylesheet" href= "backbutton.css">
      <script type="text/javascript">
         function addRow(){
            var table = document.getElementById("myTable");
            var rows = document.getElementById("myTable").rows.length;
            var row = table.insertRow(rows);
            for(var i = 0; i < 1; i++){
               var cell1= row.insertCell(i);
               var inputItem = document.createElement('input');
               cell1.appendChild(inputItem);
            }
         }
      </script>
      <title>Enroll Course </title>
   </head>
	<body bgcolor = "#FFFFFF" >
      <button class="back" onclick="location.href='studenthome.php'">◄</button>
      <h1>Enroll Course</h1>
	   <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>select semester and year</b></div>
				
            <div style = "margin:30px">
               
               <form name = "myForm" action = "?" method = "post">
                  <label>course ID :</label>
                  <input type = "number" name = "courseID" class = "box" /><br><br>
                  <label> section  :</label>
                  <input type = "number" name = "sectionID" class = "box" /><br/><br />
                  <input type = "submit"  value = " Submit "/><br />
               </form>
              <!--  <form>
               <div class="panel panel-default">
               <table id = "myTable" class="table">
                  <tr>
                     <th>courseID</th> 
                     <th>section</th>
                  </tr>
                  <tr class = "unit-table">
                     <td><input type = "text" name = "courseID" class = "box" /> </td>
                     <td><input type = "text" name = "sectionID" class = "box" ></td>
                  </tr>
               </table>
					
            </div>
				<button type = "button" id="add_btn" onclick="addRow()">Add new row</button>
          <input type="submit" name="submit" value="Submit">
         </form> -->
         </div></div></div>
   </body>

</html>

<?php
   include "session.php";
   $role = $_SESSION['user_role'];
   if(!isset($_SESSION['user_role']) | $_SESSION['user_role'] != 'student' ){
      header("Location: login.php");
   }

   
   $SEM = "2";
   $YEAR = "2017";
   if (isset($_POST['courseID']) AND isset($_POST["sectionID"])) 
   { 
      $CID = $_POST["courseID"];
      $SEC = $_POST["sectionID"];
      $query = "SELECT count(*) as count FROM section S  WHERE S.cid = " .$CID . ' and S.sec_id = '.$SEC . ' and S.yearr = '. $YEAR. " AND S.sem =  " . $SEM .";"; 
   $validCourse = mysqli_query($db, $query);
   if(!$validCourse){
      $error = "Error fetching course";
      include 'error.html.php';
      exit();
   }
   $row = mysqli_fetch_array($validCourse);
   if($row['count'] != 1){ //ไม่มีวิชา-เซคนี้
      $error = "No matching course/section";
      include 'error.html.php';
      exit();
   } 

   // check enrolled.
$query3 = 'SELECT count(*) as count, sec_id FROM enroll  WHERE sid ="'.$user_check.'" and cid = "'.$CID. '" and yearr = '.$YEAR .' and sem = '.$SEM.';';
$enrolledThisCourse = mysqli_query($db, $query3);
if(!$enrolledThisCourse){
   $error = "error fetching enroll";
   include "error.html.php";
   exit();
}else{ 
   $row3 = mysqli_fetch_array($enrolledThisCourse);
   if($row3['count'] == 0){ // not enrolled in this semester
      //valid course. check credits
      $query2 = 'SELECT sum(C.credits) as totalCredit 
                  from enroll E, course C 
                  where E.sid = "'.$user_check.'" and E.yearr = '.$YEAR. ' and E.sem = ' .$SEM. ' and C.cid = E.cid 
                  GROUP BY E.sid ;';
      $checkCredit = mysqli_query($db, $query2);
      if(!$checkCredit){
         $error = "error fetch total credits";
         include "error.html.php";
         exit();
      }else{
         $row2 = mysqli_fetch_array($checkCredit);
         $totalCredit = $row2["totalCredit"];
         if($totalCredit > 19){
               $error = "too many credits";
               include 'error.html.php';
               exit();
         }
      }
      //have enough credit
      $query4 = 'INSERT INTO enroll SET sid ="'.$user_check.'", cid = "'.$CID. '" , sec_id = "' .$SEC. '", yearr = ' . $YEAR . ' ,sem = '.$SEM.';';
      $insertR = mysqli_query($db,$query4);
      if(!$insertR){
         $error = "error inserting enroll.";
         include 'error.html.php';
         exit();
      }else{
         $error = "course enrolled!";
         include "error.html.php";
         exit();
      }
   }else{ // enrolled in this semester -> check sec_id
      if($row3['sec_id'] == $SEC){
         $error = "already enrolled D:";
         include 'error.html.php';
         exit();
      }else{
         $query5 = 'UPDATE enroll SET sec_id ='.$SEC.' WHERE sid = ' .$user_check.' and cid = '.$CID.' and yearr ='.$YEAR. ' and sem = ' .$SEM.';' ;
         $updateS = mysqli_query($db,$query5);

         if(!$updateS){
            $error = "error updating enroll.";
            include 'error.html.php';
            exit();
         }else{
             $error = "section changed!";
             include 'error.html.php';
             exit();          
         }     
      }
   }
}
}
?>
    