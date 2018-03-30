<!DOCTYPE>

<html>
	<head>
		<title>Project Result</title>
	</head>

	<body>
	<table width="700" border="5" align="center">
		<tr>
			<th>Sr.no</th>
			<th>Project Name</th>
			<th>Votes </th>

		</tr>
<?php
$Connection=mysql_connect('localhost','root','');
$Selected=mysql_select_db('newton_db',$Connection);
$ViewQuery="SELECT * From projectresult ";
$Execute=mysql_query($ViewQuery);
while($DataRows=mysql_fetch_array($Execute)){
	$Sr_no=$DataRows['no'];
	$Name=$DataRows['projectname'];
	$Number=$DataRows['projectvote'];


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
