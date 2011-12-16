<?php 
//Load the settings
require_once("settings.php");

$message = "";
//Has the user uploaded something?
if(isset($_FILES['file']))
{
	$target_path = Settings::$uploadFolder;
	$target_path = $target_path . time() . '_' . basename( $_FILES['file']['name']); 


	//Check the password to verify legal upload
	if($_POST['password'] != Settings::$password)
	{
		$message = "Invalid Password!";
	}
	else
	{


	
		//Try to move the uploaded file into the designated folder
		if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
		    $message = "The file ".  basename( $_FILES['file']['name']). 
		    " has been uploaded";
		} else{
		    $message = "There was an error uploading the file, please try again!";
		}
	}
	
	//Clear the array
	unset($_FILES['file']);
}

if(strlen($message) > 0)
{
	$message = '<p class="error">' . $message . '</p>';
}

/** LIST UPLOADED FILES **/
$uploaded_files = "";

//Open directory for reading
$dh = opendir(Settings::$uploadFolder);

//LOOP through the files
while (($file = readdir($dh)) !== false) 
{
	if($file != '.' && $file != '..')
	{
		$filename = Settings::$uploadFolder . $file;
		$parts = explode("_", $file);
		$size = formatBytes(filesize($filename));
		$added = date("m/d/Y", $parts[0]);
		$origName = $parts[1];
		$filetype = getFileType(substr($file, strlen($file) - 3));
        $uploaded_files .= "<li class=\"$filetype\"><a href=\"$filename\">$origName</a> $size - $added</li>\n";
	}
}
closedir($dh);

if(strlen($uploaded_files) == 0)
{
	$uploaded_files = "<li><em>No files found</em></li>";
}

function getFileType($extension)
{
	$images = array('jpg', 'gif', 'png', 'bmp');
	$docs 	= array('txt', 'rtf', 'doc');
	$apps 	= array('zip', 'rar', 'exe');
	
	if(in_array($extension, $images)) return "Images";
	if(in_array($extension, $docs)) return "Documents";
	if(in_array($extension, $apps)) return "Applications";
	return "";
}

function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
   
    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 
   
    $bytes /= pow(1024, $pow); 
   
    return round($bytes, $precision) . ' ' . $units[$pow]; 
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
        <h1><a href="index.php"><span>file</span>uploader</a><small>By Michael and Paul</small></h1>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        
        <div class="search">
          
        </div>
      </div>
      <div class="clr"></div>
      <div class="header_img"> 
	  
	  
	  

	  
	<a href="index.php">Home</a>&#9474;<a href="logout.php">Logout</a>
 <h1>File Storage</h1>


<form method="post" action="uploadpage.php" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="100000" />


<fieldset style="width:90%;">

		<legend>Add a new file to the storage</legend>
			<?php echo $message; ?>
			<p><label for="name">Select file</label><br />
			<input type="file" name="file" /></p>
			<p><label for="password">Password for upload (Leave Blank)</label><br />
			<input type="password" name="password" /></p>
			<p><input type="submit" name="submit" value="Start upload" /></p>	
</fieldset>
	</form>


<fieldset style="width:90%;">

		<legend>Previousely uploaded files</legend>
			<ul id="menu">
				<li><a href="">All files</a></li>
				<li><a href="">Documents</a></li>
				<li><a href="">Images</a></li>
				<li><a href="">Applications</a></li>
			</ul>
			
			<ul id="files">
				<?php echo $uploaded_files; ?>
			</ul>
</fieldset>

</div>

<script src="js/filestorage.js" />
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
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
