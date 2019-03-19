<html>
<head>
	<title>check out</title>
</head>
<body>
<h1>check out</h1>
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
	/*if(empty($_POST['name'])||empty($_POST['phone'])||empty($_POST['province'])||empty($_POST['city'])||empty($_POST['location']))
	{
		echo" please fill you infotmation!";	*/
		if($total_amount>0)
		{
			echo '<form method="post" action="purchase.php">';
				echo '<table border=0 width ="60%">';
				echo'<caption align="center">please input receiver information</caption>';
			echo '<tr>
				<td width=200 align="center" >Name:</td>
				<td width=600 align="center"><input type="text" required name="name" size=80 ></td>
				</tr>';
			echo '<tr>
				<td width=200 align="center" >Phone:</td>
				<td width=600 align="center"><input type="text" required name="phone" size=80  ></td>
				</tr>';
			echo '<tr>
				<td width=200 align="center" >Province:</td>
				<td width=600 align="center"><input type="text" required name="province" size=80 ></td>
				</tr>';
			echo '<tr>
				<td width=200 align="center" >City:</td>
				<td width=600 align="center"><input type="text" required name="city" size=80 ></td>
				</tr>';
			echo '<tr>
				<td width=200 align="center" >District:</td>
				<td width=600 align="center"><input type="text" name="district" size=80 ></td>
				</tr>';
			echo '<tr>
				<td width=200 align="center" >Location:</td>
				<td width=600 align="center"><input type="text" required name="location" size=80 ></td>
				</tr>';
			echo'<tr>';
				echo'<td colspan=2 align="center"><input type="submit" value="Submit" ></td>';
			echo'</tr>';
				echo '</table>';
			echo '</form>';
		}
	
	/*else
	{
		include 'purchase.php';
	}*/

?>



<button type="button" align="center">continue shopping</button>

</body>
</html>
