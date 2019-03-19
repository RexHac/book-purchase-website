<html>
<head>
	<title>submit order</title>
</head>
<body>
<h1>submit order</h1>




<?php

@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');

if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}
$cusid=1;
$sql="select * from cart where cus_ID=".$cusid."";
$result=$db->query($sql);
$num=$result->num_rows;
$toatl_cost=0;
$total_amount=0;
if($num==0)
{
	echo '<p>You have not buy anything! <a href="index.php"> Go to index</a></P>';
}
//bgcolor="#cccccc"
?>

<table>
	<tr style='background-color:#cccccc;'>
		<td width=400 align="center" >Item</td>
		<td width=200 align="center">price</td>
		<td width=200 align="center">Quantity</td>
		<td width=200 align="center">Total cost</td>
	</tr>
	<?php
		for($i=0;$i<$num;$i++)
		{
			$rows=$result->fetch_assoc();
			$isbn=$rows['book_isbn'];
			$amount=$rows['amount'];
			$total_amount=$total_amount+$amount;
			$sql1="select *from book where isbn=".$isbn."";
			$result1=$db->query($sql1);
			$row=$result1->fetch_assoc();
			echo"<tr>";
			echo '<td align="center"><strong>'.$row["title"].'</strong></td>';
			echo '<td align="center"> <Strong> '.$row["price"].'</strong></td>';
			echo '<td align="center"> <strong> '.$amount.'</strong></td>';
			echo '<td align="center"> <strong> '.$amount*$row["price"].'</strong></td>';
			$total_cost=$total_cost+$amount*$row['price'];
			echo"</tr>";
		}
	?>
	<tr style='background-color:#cccccc;'>
		<td colspan=3 align="right"><?php echo $total_amount;?></td>
		<td align="right"><?php if($total_amount==0){echo 0;} else {echo $total_cost;}?></td>
		
	</tr>
	
</table>
<hr/>

<?php
global $db;
//$curid=$_GET['curid'];


//$db->autocommit(FALSE);
$date=date('H:i,jS F Y');
if(empty($_POST['city']))
{
	echo "shit";
}
$province=$_POST['province'];
$city=$_POST['city'];

$district=$_POST['district'];
$location=$_POST['location'];

/*



create table order_item
	(orditemID		int(10) auto_increment,
	 ord_ID			int(10)  references orders(orderID),
     book_isbn		numeric(13,0) references book(isbn),
	 primary key (orditemID)
	);
*/

$sql2="insert into cus_address(cus_ID,province,city,district,location) values(".$cusid.",'".$province."','".$city."','".$district."','".$location."')";
$result2=$db->query($sql2);

$sql3='select cus_addressID from cus_address where cus_ID='.$cusid.'';
$result3=$db->query($sql3);

//print_r($result3);
$row1=$result3->fetch_assoc();
$cus_addressID=$row1['cus_addressID'];

$sql4="insert into orders(cus_ID,cus_address,tot_cost,date) values(".$cusid.",".$cus_addressID.",'".$total_cost."','".$date."')";
$result4=$db->query($sql4);

//print_r($result4);
$sql5='select orderID from orders where cus_ID='.$cusid.'';
$result5=$db->query($sql5);
//print_r($result5);
$row2=$result5->fetch_assoc();
$orderID=$row2['orderID'];

//
$sql6="select * from cart where cus_ID=".$cusid."";
$result6=$db->query($sql);
$num=$result6->num_rows;
for($i=0;$i<$num;$i++)
{
	$row3=$result6->fetch_assoc();
	$isbn=$row3['book_isbn'];
	$sql5="insert into order_item(ord_ID,book_isbn) values(".$orderID.",".$isbn.")";
	$resultn=$db->query($sql5);

}
//$sql5='insert into order_item(ord_ID,book_isbn) values('".$row2['orderID']"','"$isbn"')';
//$num=$result->num_rows;


$db->commit();
$db->autocommit(true);

?>

<form action="process.php" method="POST">
<table>
		<caption style='background-color:#cccccc;' align="center">pay</caption>
		<tr>
			<td width=400 align="center" >type</td>
			<td width=600><select name="type">
			    <option value="none">--choose payment type--</option>
			    <option value="Alipay">Alipay</option>
			    <option value="Wechatpay">Waychatpay</option>
			    <option value="CreditCard">CreditCard</option>
			    </select>
		</tr>
		<tr>
			<td align="center">number</td>
			<td><input type="text" required name="number"></td>
		</tr>
		<tr>
			<td align="center" >password</td>
			<td ><input type="text" required name="psd"></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" value="buy"></td>
		</tr>
</table>

</form>
<?php
$result->free();
$db->close();
?>








</body>
</html>
