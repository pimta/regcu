<?php
   include("config.php");
   session_start();
   $error = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $myhashpw = password_hash($mypassword, PASSWORD_DEFAULT);
      //$myhashpw = hash('sha256', $mypassword);
      $query = 'SELECT * FROM userpass WHERE username = "' . $myusername .'" and password = "' . SHA1($mypassword) .'";';
      $result = mysqli_query($db,$query);
      $row = mysqli_fetch_array($result);
      if(mysqli_num_rows($result) == 0){
        header('Location : login.php');
      }
      else {  
          session_regenerate_id();
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_role'] = $row['role'];
         if($_SESSION['user_role'] == "student"){ //1
            header('Location: studenthome.php');
         }else if($_SESSION['user_role'] == "teacher"){
            header('Location: teacherhome.php');
         }else if($_SESSION['user_role'] == "staff"){
            header('Location: staffhome.php');
         }
      }
   }
?>

<html>
   
   <head>

      <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet"> 
      <link rel="stylesheet" href="login.css">
      <title>Login</title>
      
      
   </head>
   
   <body bgcolor = "#2c3338">

         <h1>miniRegCU</h1>
    <div id="login">
      <form name='form-login' action = "" method = "post">
        <span class="fontawesome-user"></span>
          <input name = "username" type="text" id="user" placeholder="Username">
       
        <span class="fontawesome-lock"></span>
          <input name = "password" type="password" id="pass" placeholder="Password">
        
        <input type="submit" value="Login">
    </form>
</div>

<div class="masthead segment">
  <div class="ui page grid">
    <div class="column">
      <div class="introduction">
        <h1 class="ui inverted header">
          <span class="text">Perspective background from old <a href="https://www.semantic-ui.com/" target="_new">Semantic UI</a> website</span>
        </h1>        
        <div class="ui hidden divider"></div>        
      </div>      
    </div>
  </div>
</div>

   </body>
</html>