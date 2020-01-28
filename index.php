<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>User panel</h1>
<?php 
	if (!isset($_COOKIE['LoggedInUser'])){
		echo "<a href='login.php'>Admin panel</a>";
	}
	else{
		echo "<a href='index.php?id=1'>Admin panel</a>";
	}  
?>
</body>
</html>