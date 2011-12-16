<?php include "base.php"; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DV8uploader</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo"> <img src="images/logo_img.gif" alt="" width="51" height="48" />
        <h1><a href="index.php"><span>file</span>uploader</a><small>By Michael and Paul</small></h1>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        
        <div class="search">
          
        </div>
      </div>
      <div class="clr"></div>
      <div class="header_img"> 
	  
	  
	  <?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $email = mysql_real_escape_string($_POST['email']);
    
	 $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
     
     if(mysql_num_rows($checkusername) == 1)
     {
     	echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else
     {
     	$registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");
        if($registerquery)
        {
        	echo "<h1>Success</h1>";
        	echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
        }
        else
        {
     		echo "<h1>Error</h1>";
        	echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }    	
     }
}
else
{
	?>
    
   <h1>Register</h1>
    
   <p>Please enter your details below to register. Once done click the register button!</p>
    
	<form method="post" action="register.php" name="registerform" id="registerform">
		<label for="username">Username:</label><input type="text" name="username" id="username" /><br /><br />
		<label for="password">Password:</label><input type="password" name="password" id="password" /><br /><br />
        <label for="email">Email Add:</label><input type="text" name="email" id="email" /><br /><br />
		<input type="submit" name="register" id="register" value="Register" />
	</form>
    
   <?php
}
?>
	  
	  
	  
	 </div>
	 </div>
    <div class="footer">
      <p class="lr">Copyright &copy; 2011 <a href="#">fileuploader</a> - All Rights Reserved</p>
      <p class="lf">Layout by <a href="#">Team Serpico</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>