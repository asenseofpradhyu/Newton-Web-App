<!DOCTYPE>

<html>
	<head>
		<title>Voter Information</title>
	</head>

	<body>
	<table width="700" border="5" align="center">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Contact Number</th>

		</tr>
<?php
$Connection=mysql_connect('localhost','root','');
$Selected=mysql_select_db('newton_db',$Connection);
$ViewQuery="SELECT * From voter_info ";
$Execute=mysql_query($ViewQuery);
while($DataRows=mysql_fetch_array($Execute)){
	$Sr_no=$DataRows['sr.no'];
	$Name=$DataRows['name'];
	$Number=$DataRows['number'];


?>
<tr>
<td><?php echo $Sr_no; ?></td>
<td><?php echo $Name; ?></td>
<td><?php echo $Number; ?></td>

</tr>

<?php } ?>


	</table>


	</body>
</html>
