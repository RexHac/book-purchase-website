<html>
<head>
	<title>book detiles</title>
</head>
<body>

<?php
//echo "start</br>";
/*if(empty($_GET['isbn'])){
echo "yes";
}*/

/*
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
*/
$cusid=1;

///
$isbn=$_GET['isbn'];


@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}
//use dbsclab2018;
//$db->select_db(dbsclab2018);
$sql="select * from book where isbn=".$isbn."";
$result=$db->query($sql);
//$num=$result->num_rows;

//for($i=0;$i<$num;$i++)
//{
	$rows=$result->fetch_assoc();
	
	echo "<p><strong>title: ".$rows['title']."</strong>";
	echo "<br/> author: ".$rows['author'];
	echo "<br/> introduction: ".$rows['introduction'];
	echo "<br/> price: ".$rows['price']."</p>";
	//echo '<HR style="FILTER: alpha(opacity=0,finishopacity=100,style=1)" width="80%" color=#987cb9 SIZE=3>';
//}
//echo "end";



function insert($cusid,$isbn,$amount)
	{
		echo $cusid."_ ".$isbn."_".$amount;
		@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
		if(mysqli_connect_errno())
		{
			echo 'Error : can not connect to database . Please try again.';
			exit;
		}
		$sql="insert into cart(cus_ID,book_isbn,amount) values(".$cusid.",".$isbn.",".$amount.")";
		$result=$db->query($sql);
		if($result){;}else{echo "pro";}
	}



echo '<form method="POST">';
echo 'quantity: <input width=5 type="text" name="q">';
echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" value="Submit">add to cart</button>';
echo '</form>';



if(!empty($_POST['q']))
{
	insert($cusid,$isbn,$_POST['q']);
	echo  $_POST['q'];
	echo "add success!!";
}
echo '<hr/><a href="index.php">back to index</a>';
$result->free();
$db->close();
?>
</body>
</html>
