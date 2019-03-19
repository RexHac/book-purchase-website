<html>
<head>
	<title>cart</title>
</head>
<body>

<?php

/*
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
*/
$cusid=1;

///

@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
if(mysqli_connect_errno())
{
	echo 'Error : can not connect to database . Please try again.';
	exit;
}

$sql="select * from cart where cus_ID=".$cusid."";
$result=$db->query($sql);
$num=$result->num_rows;
?>
<form method="post" action="checkout.php">
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
		<td align="center">Total</td>
		<td></td>
		<td  align="center"><?php echo $total_amount;?></td>
		<td align="center"><?php if($total_amount==0){echo 0;} else {echo $total_cost;}?></td>
		
	</tr>
	<tr>
		<td align="center" colspan=4><input type="submit" value="buy now"></td>
	</tr>
	
</table>
</form>

<?php



echo '<hr/><a href="index.php">back to index</a>';
$result->free();
$db->close();
?>
</body>
</html>
