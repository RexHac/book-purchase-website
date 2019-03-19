

<html>
<head>
	<title>a result</title>
</head>
<body>

<?php
//include 'book_fns.php';
/*if(empty($_GET['catid'])){
echo "Sorry we don't have this kind of book";
}*/
$chosencat=$_GET['catid'];
//echo $chosencat;
//echo "start</br>";
@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}
//use dbsclab2018;
//$db->select_db(dbsclab2018);
$sql="select * from book where cat_ID=".$chosencat."";
$result=$db->query($sql);
$num=$result->num_rows;
if($num==0)
{
	echo "Sorry we don't have this kind of book";
}

for($i=0;$i<$num;$i++)
{
	$rows=$result->fetch_assoc();
	$url="show_book.php?isbn=".($rows['isbn']);
 	echo "<a name='type' href='$url' target='_blank'>";
	echo "<p><strong> Title: ".$rows['title']."</strong>";
	echo "</a>";
	echo " &nbsp <strong>author:</strong> ".$rows['author'];
	//echo "<br/> introduction: ".$rows['introduction'];
	echo " &nbsp <strong>price:</strong> ".$rows['price'];
	//echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit"  value="Submit">cart</button></p>';
	echo '<HR style="FILTER: alpha(opacity=0,finishopacity=100,style=1)" width="100%" color=#987cb9 SIZE=3>';
}
//echo "end";

echo '<hr/><a href="index.php">back to index</a>';
$result->free();
$db->close();
?>
</body>
</html>
