<?php
   include('session.php'); 
   $role = $_SESSION['user_role'];
   if(!isset($_SESSION['user_role']) | $_SESSION['user_role'] != 'staff' ){
      header("Location: login.php");
   }
?>

<!DOCTYPE html>
<html">
   
   <head>
      <title>Main Menu </title>
    	<link rel = "stylesheet" href = "studenthome.css">
 
</head>
   
<body>
      <header>
         
         <h2><a id="sighout" href = "logout.php">Sign Out <img src="https://home.realart.com/assets/img/icon_logout.png" width="20px"> </a></h2></header>

      <h1> Main Menu </h1>

       <!-- add/edit/remove course -->
      <button class="button pink" name = "ManageCourse" onclick="location.href='manageCourse.php'" > Manage Course <div class="button__horizontal"></div><div class="button__vertical"></div></button> 

      <!-- add/edit/remove teacher -->
      <button class="button pink" name = "ManageTeacher" onclick="location.href='manageCourse.php'" > Manage Teacher <div class="button__horizontal"></div><div class="button__vertical"></div></button> 
 
      <!-- add/edit/remove a student, show students info -->
      <button class="button white" name = "Manage Student" onclick="location.href='manageStudent.php'"> Manage Student  <div class="button__horizontal"></div><div class="button__vertical"></div></button>
      
      
      <button class="button pink" name = "ManageScholarship" onclick="location.href='showEnrolledCourse.php'"> Manage Scholarship <div class="button__horizontal"></div><div class="button__vertical"></div></button>

       <button class="button white" name = "Enroll" onclick="location.href='EnrollCourse.php'"> Enroll Course <div class="button__horizontal"></div><div class="button__vertical" ></div></button>
      
       <button class="button pink" name = "scholarship" onclick = "location.href = 'ApplySch.php'"> Scholarship <div class="button__horizontal"></div><div class="button__vertical"></div></button>

   </body>
   
</html>