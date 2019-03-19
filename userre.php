
<!DOCTYPE HTML> 
<html>

<head>
<title>user register</title>
</head>
<body>
<form method="post" action= "reply.php">
<table border="0">
<tr>    
	<td width="25">Name:</td>
	<td width="60" align="center" ><input type="text" required name="u_name" size="45" maxlength="45"/></td>	 
</tr>

<tr>
	<td>Email:</td>
	<td align="center" ><input type="text" required name="u_email" size="45" maxlength="45"/></td>

</tr>

<tr>
	<td width="150" align="center"><input type="radio" required  value="accept" name="isaccept"/>accept</td>
	<td width="150" align="center"><input type="radio" required value="unaccept" name="isaccept"/>don't accept</td>

</tr>
<tr>
	<td colspan="2" width="150" align="center"><input type="submit" value="Submit"/></td>
</tr>
</table>
</form>
</body>
</html>
