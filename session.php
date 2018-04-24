<?php
   include('config.php');
   
   session_start();
   $user_check = $_SESSION['login_user'];
  
    $ses_sql = mysqli_query($db,"select username, role from userpass where username = '$user_check' ");
   
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
    $login_user = $row['username'];
    $user_role = $_SESSION['user_role'];
?>
