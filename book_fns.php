<html>
<body>
<?php
//echo "book_fns.php</br>";
//@ $db = new mysqli("localhost","Shirley",'smartNhot','dbsclab2018');
@ $db = new mysqli("localhost","myuser",'123','dbsclab2018');
if (mysqli_connect_errno()){
 echo 'Error: Could not connect to database.';
 exit;
}

function get_categories(){
//echo 'get_categories()';
global $db;
$conn=$db;
$query="select categoryID,name from category";
$result=@$conn->query($query);
$num=@$result->num_rows;
if($num==0)	return false;
$cat=array();
for($i=0;$row=$result->fetch_assoc();$i++){
 $cat[$i]=$row;
// print_r($cat[$i]);
	}
//echo $cat[0][1];
return $cat;
}

function display_categories($cat){
//echo 'display_categories($cat)';
if(!is_array($cat)){
 echo '<p>No category currently available</p>';
 return;
 }
echo "<ul>";
foreach($cat as $row){
 $url="show_cat.php?catid=".($row['categoryID']);
 $title=$row['name'];
 echo "<li>";
 echo "<a name='type' href='$url' target='_blank'>";
 echo $title;
 echo "</a>";
 echo "</li>";
 }
echo "</ul>";
}

//$cat=get_categories();
//display_categories($cat);

//$result->free();
//$db->close();

?>
</body>
</html>

