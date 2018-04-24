<?php
   include('session.php'); 
   $role = $_SESSION['user_role'];
   if(!isset($_SESSION['user_role']) | $_SESSION['user_role'] != 'student' ){
      header("Location: login.php");
   }
?>
<html">
   
   <head>
      <title>Main Menu </title>
      <p style="font-size: 20px; color: white"><?php echo $login_user ?></p>

    	<link rel = "stylesheet" href = "studenthome.css">
 
</head>
   
<body>
      <header>
         
         <h2><a id="sighout" href = "logout.php">Sign Out <img src="https://home.realart.com/assets/img/icon_logout.png" width="20px"> </a></h2></header>

      <h1> Main Menu </h1>

<!-- ดูผลการจ่ายค่าเทอม -->
      <button class="button pink" name = "showPaymentInfo" onclick="location.href='showInfo.php'" > Payment info <div class="button__horizontal"></div><div class="button__vertical"></div></button>

      <!-- ดูเกรดรายวิชา -->
      <button class="button white" name = "transcript" onclick="location.href='showTranscript.php'"> Transcript  <div class="button__horizontal"></div><div class="button__vertical"></div></button>
      

      <button class="button pink" name = "showEnrolledCourse" onclick="location.href='showEnrolledCourse.php'"> Show enrolled course <div class="button__horizontal"></div><div class="button__vertical"></div></button>

      <!-- search course -->
      <button class="button pink" name = "searchCourses" onclick="location.href='SearchCourses.php'"> Search Courses <div class="button__horizontal"></div><div class="button__vertical"></div></button>

<!-- ลงทะเบียน -->
     <button class="button white" name = "Enroll" onclick="location.href='EnrollCourse.php'"> Enroll Course <div class="button__horizontal"></div><div class="button__vertical" ></div></button>
   
    <!-- เพิ่ม ลด ถอน -->
     <button class="button white" name = "Withdraw" onclick="location.href='WithdrawCourse.php'"> Withdraw Course <div class="button__horizontal"></div><div class="button__vertical" ></div></button>  

<!-- ดูประวัติทุนที่ได้ -->
     <button class="button pink" name = "view scholarship" onclick = "location.href = 'ViewSch.php'"> View Scholarship <div class="button__horizontal"></div><div class="button__vertical"></div></button>

<!-- ตรวจสอบเงื่อนไขสมัครทุน -->
     <button class="button pink" name = "apply scholarship" onclick = "location.href = 'ApplySch.php'"> Check Scholarship Qualification <div class="button__horizontal"></div><div class="button__vertical"></div></button>

   





   </body>
   
</html>