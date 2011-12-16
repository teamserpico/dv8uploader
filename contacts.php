<?php
	if($_POST['formSubmit'] == "Submit") 
    {
		$errorMessage = "";
		
		if(empty($_POST['formMovie'])) 
        {
			$errorMessage .= "<li>You forgot to enter a movie!</li>";
		}
		if(empty($_POST['formName'])) 
        {
			$errorMessage .= "<li>You forgot to enter a name!</li>";
		}
		if(empty($_POST['formGender'])) 
        {
			$errorMessage .= "<li>You forgot to select your Gender!</li>";
		}

        $varMovie = $_POST['formMovie'];
		$varName = $_POST['formName'];
		$varGender = $_POST['formGender'];

		if(empty($errorMessage)) 
        {
			$db = mysql_connect("mysql11.000webhost.com","a4578459_bk","aaaaaa03");
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("a4578459_save" ,$db);

			$sql = "INSERT INTO contacts (moviename, yourname, Gender) VALUES (".
							PrepSQL($varMovie) . ", " .
							PrepSQL($varName) . ", " .
							PrepSQL($varGender) . ")";
			mysql_query($sql);
			
			header("Location: contacts.php");
			exit();
		}
	}
            
    // function: PrepSQL()
    // use stripslashes and mysql_real_escape_string PHP functions
    // to sanitize a string for use in an SQL query
    //
    // also puts single quotes around the string
    //
    function PrepSQL($value)
    {
        // Stripslashes
        if(get_magic_quotes_gpc()) 
        {
            $value = stripslashes($value);
        }

        // Quote
        $value = "'" . mysql_real_escape_string($value) . "'";

        return($value);
    }
?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DV8uploader</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link href="styleupload.css" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-latest.js"></script>

</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo"> <img src="images/logo_img.gif" alt="" width="51" height="48" />
        <h1><a href="index.html"><span>file</span>uploader</a><small>By Michael and Paul</small></h1>      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        
        <div class="search">
          
        </div>
      </div>
      <div class="clr"></div>
      <div class="header_img"> 
	  
	  
	   <?php
		    if(!empty($errorMessage)) 
		    {
			    echo("<p>There was an error with your form:</p>\n");
			    echo("<ul>" . $errorMessage . "</ul>\n");
            }
        ?>

	  
	  	<a href="index.php">Home</a>&#9474;<a href="logout.php">Logout</a>
	  <h1>Save Your Contacts</h1>


	<fieldset style="width:90%">
				<legend>Add a new Contact</legend>

				
				
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<p>
				<label for='formMovie'>Please enter contacts name:</label><br/>
				<input type="text" name="formMovie" maxlength="50" size="40" value="<?=$varMovie;?>" />
			</p>
			<p>
				<label for='formName'>Please enter contacts number:</label><br/>
				<input type="text" name="formName" maxlength="50" size="40" value="<?=$varName;?>" />
			</p>
			<p>
				<label for='formGender'>Select contact group</label><br/>
				<select name="formGender">
					<option value="">Select...</option>
					<option value="Family"<? if($varGender=="Family") echo(" selected=\"selected\"");?>>Family</option>
					<option value="Friends"<? if($varGender=="Friends") echo(" selected=\"selected\"");?>>Friends</option>
					<option value="Work"<? if($varGender=="Work") echo(" selected=\"selected\"");?>>Work</option>

				</select>
			</p>
			<input type="submit" name="formSubmit" value="Submit" />
		</form>
				
				
				
				
		</fieldset>

	<fieldset style="width:90%">
						<legend>Contacts</legend>

						
						
						
						
						
						
						
	<?php

$connect = mysql_connect("mysql11.000webhost.com", "a4578459_bk", "aaaaaa03") or

die ("Hey loser, check your server connection.");

mysql_select_db("a4578459_save");

$quey1="select * from contacts";

$result=mysql_query($quey1) or die(mysql_error());

?>

<table width="100%" border=1 style="background-color:#fff;" >

<caption><EM>All your Uploaded Contacts</EM></caption>

<tr>

<th>Contact Name</th>

<th>Contact Number</th>

<th>Group</th>

</tr>

<?php

while($row=mysql_fetch_array($result)){

echo "</td><td>";

echo $row['moviename'];

echo "</td><td>";

echo $row['yourname'];

echo "</td><td>";

echo $row['Gender'];

echo "</td></tr>";

}

echo "</table>";

?>		
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
	</fieldset>


	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
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
