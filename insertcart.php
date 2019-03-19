<?php
	
/*
create table cart
	(
     cus_ID			numeric(9,0) references customer(customerID),
     book_isbn		numeric(13,0) references book(isbn),
     amount			numeric(9,0)
	);
*/
	function insert($cusid,$isbn,$amount)
	{
		@ $db=new mysqli('localhost', 'myuser', '123', 'dbsclab2018');
		if(mysqli_connect_errno())
		{
			echo 'Error : can not connect to database . Please try again.';
			exit;
		}
		$sql="insert into cart(cus_ID,book_isbn,amount) values(".$cusid.",".$isbn.",".$amount.")";
		$result=$db->query($sql);
	}

	
?>
