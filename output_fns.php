<html>
<head>
	<title>view cart</title>
</head>
<body>

<?php
//echo "start</br>";
/*if(empty($_GET['isbn'])){
echo "yes";
}*/
//$isbn=$_GET['isbn'];
@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}

function display_cart($cart,$cusid,$change=true)
{
	$sql="select * from cart where cus_ID=".$icusid."";
	$result=$db->query($sql);
	$num=$result->num_rows;
	for($i=0;$i<$num;$i++)
	{
		$rows=$resut->fetch_assoc();
		$isbn=$rows['book_isbn'];
		$amount=$rows['amount'];
		$sql1="select *from book where isbn=".isbn."";
		$result1=$db->query($sql1);
		$row=$result1->fetch_assoc();
		echo "<strong> title: ".$row['title']."</strong>";
		echo " <Strong> price: </strong>".$row['price']."";
		echo " <strong> amount: </strong>".$amount."";
	}
}

//use dbsclab2018;
//$db->select_db(dbsclab2018);

$result=$db->query($sql);

$rows=$result->fetch_assoc();

echo "<p><strong>title: ".$rows['title']."</strong>";
echo "<br/> author: ".$rows['author'];
echo "<br/> introduction: ".$rows['introduction'];
echo "<br/> price: ".$rows['price']."</p>";
	//echo '<HR style="FILTER: alpha(opacity=0,finishopacity=100,style=1)" width="80%" color=#987cb9 SIZE=3>';
//}
//echo "end";
echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" value="Submit">cart</button>';
echo '<hr/><a href="index.php">back to index</a>';
$result->free();
$db->close();
?>
</body>
</html>
