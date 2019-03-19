<html>
<head>
 <title>Register Reply</title>
</head>
<body>
<?php
	
     if($_POST['isaccept']=="accept")
	{
		echo "<h1>Congratulation!</h1>";
	}
     if($_POST['isaccept']=="unaccept")
	{
		echo "<h1>Sorry</h1>";
	}
?>
</body>
</html>
