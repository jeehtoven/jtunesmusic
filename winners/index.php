<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
</head>
<style>
body {background-image:url('cover.jpg');background-repeat:no-repeat;background-attachment:scroll;background-size:700px 700px;background-position:center top}
</style>
<body>
<?php

//Scans directory for filenames
$dir    = '/home5/jeehtove/public_html/jtunes/winners';
$files1 = scandir($dir);
$count = 1;

//Counter used to id buttons
$button_number = 1;

//Display Album Title
//echo "<p align='center'><font face='verdana' size='6'>" . substr(strrchr($dir,"/"),1) . "</font></p>";

//Loop through array of filenames and check for directory navigation and files that aren't mp3s
foreach ($files1 as $file) {
	if ('.' === $file) continue;
	if('..' === $file) continue;
	if(strpos($file,"mp3") === FALSE) continue;
	
	
	//Create a link for each file in directory and a Play button
	echo "<p align='right'><font face='verdana' size='3'><a href='" . $file . "'>" . $file . "</a>&nbsp;&nbsp;<button id='".$file."'>Play</button></font></p>";
	
	//Logic to play whatever song user clicks on
	echo "<script>\$(document).ready(function(){\$('button').click(function(){var id = $(this).attr('id');document.getElementById('player').src = id;});});</script>";
	$count = $count + 1;
	
	//Increase $button_number by 1
	$button_number = $button_number + 1;
	
}

//The real album count. The folder contains the image.jpg, index.php file, download.gif, and the "." and ".." navigation nodes, so 3 is subtracted from the total count
$real_count = count($files1) - 7;

//Generate random number for the audio player to play random tracks from album
$rand_num = rand(1,$real_count);

//Download Album Link
echo "<br><br<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><font face='verdana'><a href='" . substr(strrchr($dir,"/"),0) . ".zip'><img src='download.gif' alt='Download Now!' length='100' width='100'></a></font></center><br><br>";

//Album information
echo "<br><br><center><font face='verdana'>There are " . $real_count . " tracks in this album.</font></center><br>";
echo "<center><font face='verdana'>Now Playing: <b><i>" . $files1[$rand_num] . "</b></i></font></center><br><br>";
?>
<br><br>
<center><audio id='player' autoplay='autoplay' controls='controls'><source id='trackname' src='<?php echo $files1[$rand_num]?>' type='audio/mpeg' >Your browser does not support audio.</audio></center>
</body>
<title><?php echo substr(strrchr($dir,"/"),1);?></title>
</html>