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
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
	 ?>
    
    <h1>Member Area</h1>
   	 <p>Thanks for logging in!</p> 
         <p>You are <b><?=$_SESSION['Username']?><b> and your email address is <b><?=$_SESSION['EmailAddress']?></b>.</p>
    
    <ul>
        <li><a href="logout.php">Logout.</a></li>
    </ul></br>
    
	<p><font size="4">Where do you want to go? Choose from list below</font></p></br>
		

<!------------ Images for where to go -------------->




<TABLE>
<TR> <TD><a href="uploadpage.php"><p><img src="images/upload.jpg" alt="" width="129" height="116" float="left" /></br>Upload files here</p></a></TD>   <TD>----------------</TD>    <TD><a href="contacts.php"><p><img src="images/contact.jpg" alt="" width="129" height="116" /></br>Save your Contact here</p></a></TD> </TR>
<TR> <TD><a href="bookmarks.php"><p><img src="images/bookmark.jpg" alt="" width="129" height="116" float="left" /></br>Bookmarks,It's NEW!</p></a></TD>     <TD></TD> </TR>

</TABLE>





	
	
    <?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
	 $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    
	 $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
    
    if(mysql_num_rows($checklogin) == 1)
    {
    	 $row = mysql_fetch_array($checklogin);
        $email = $row['EmailAddress'];
        
        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
        
    	 echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='=2;index.php' />";
    }
    else
    {
    	 echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
    }
}
else
{
	?>
    
   <h1>Member Login</h1>
    
   <p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p>
    
	<form method="post" action="index.php" name="loginform" id="loginform">
		<label for="username">Username:</label><input type="text" name="username" id="username" /><br /><br />
		
		
		<label for="password">Password:</label><input type="password" name="password" id="password" /><br /><br />
		
		<input type="submit" name="login" id="login" value="Login" />
	</form>
    
   <?php
}
?>
</div>
	  </div>
	  </div>
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