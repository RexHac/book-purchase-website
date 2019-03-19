<html>
<head>
<title>information</title>
</head>
<body>


<form action="query.php" method="post">
<table>
	<tr>
		<td>input</td>
		<td><input type="text" name="info"></td>
		<td><input type="submit" value="Search"></td>
	</tr>

</table>
</form>


<?php

$name=$_POST['info'];
@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}
if(empty($_POST['info']))
{
   $sql="select * from instructor";	
}
else
{
	$sql="select * from instructor where name='".$name."'";
}
$result=$db->query($sql);
if($result){;}else{echo" problem";}
$num=$result->num_rows;
if($num==0)
{
	echo "Sorry the instructor doesn't exist";
}
else{
for($i=0;$i<$num;$i++)
{
	$rows=$result->fetch_assoc();
 	echo "</br>".$rows['ID']."&nbsp".$rows['name']."";
}
}


?>
</body>
</html>
