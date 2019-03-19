<html>
<title>NERDS</title>
<body>
<?php
//echo "start";
include 'book_fns.php';
echo "<h1> Welcome to nerds</h1>";
$cat=get_categories();
display_categories($cat);
?>
</body>
</html>

