<html>
<head>
<title>Result</title>
<!--
<script type="text/javascript">
    function WriteCookie(name) {
        var cookie = "name; path=/var/www/html";
        document.cookie = cookie;
    }    
</script>
-->
</head>
<body>
<?php

/*@ $db = new mysqli("localhost","Shirley",'smartNhot','dbsclab2018');
if (mysqli_connect_errno()){
 echo 'Error: Could not connect to database.';
 exit;
}*/
@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');

if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}
function registerphp()
{
global $db;
$conn=$db;
$sql="select * from customer where phone=".$_POST['phone']."";
$result=@ $conn->query($sql);
//print_r($result);
$num=$result->num_rows;
//echo $num;
	if($num>0)
	{
		echo "You've already registered!";
		echo "<p style='color:#888888;'>back to index.php in 3s</p >";
		header("Refresh:3;url=index.php");
		return false;
	}
$sql='insert into customer(name,phone,password) values('.$_POST['name'].','.$_POST['phone'].','.$_POST['password'].')';
@ $conn->query($sql);
echo "Registered successfully!";
echo "<p style='color:#888888;'>back to index.php in 3s</p >";
header("Refresh:3;url=index.php");
return true;
}

function loginphp()
{
//echo "happy";
global $db;
$conn=$db;

$sql="select name,password,phone from customer where phone=".$_POST['phone']."";
$result=@ $conn->query($sql);
//print_r($result);
$row=$result->fetch_assoc();
	if($row['password']==$_POST['password'])
	{
		echo "<b style='color:#ff3333;'>Login in successfully!</b>";
		setcookie("cookie[name]",$row['name'],time()+3600,"/",".app.localhost");
		setcookie("cookie[phone]",$row['phone'],time()+3600,"/",".app.localhost");
		if(isset($_COOKIE['cookie']))
		{
		  	foreach ($_COOKIE['cookie'] as $name => $path)
			{
			$name = htmlspecialchars($name);
			$path = htmlspecialchars($path);
			echo "$name : $path <br />\n";
	    		}
		}
	else echo"Ops";
	echo "<p style='color:#888888;'>back to index.php in 3s</p >";
	header("Refresh:3;url=index.php?name=".$row['name']."&phone=".$row['phone']);
	return true;
	}
echo "<b style='color:#ff0000;font:42px;'>Invalid phone number or password!</br>Please try again or register if you don't have our account.</b>";
echo "<p style='color:#888888;'>back to index.php in 3s</p >";
header("Refresh:3;url=index.php");
return false;
}
if($_POST['table']=="register") registerphp();
else loginphp();
//$db->commit();

?>
</body>
</html>
