<?php 
session_start();


$_SESSION['color'] = "blue";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<h4><?php echo $_SESSION['color'];?></h4>
	
</body>
</html>