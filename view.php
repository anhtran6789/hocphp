<?php
include('db.php');
?>

<table align="center" cellpadding="5" cellspacing="0" border="1">
	<tr align="center">
		<td>Index</td>
		<td>Username</td>
		<td>Email</td>
		<td>Password</td>
		<td>Action</td>
	</tr>
	<a href="manage.php" > Add new </a>
<?php
$sql="select * from user";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	$i=1;
	while($row=mysql_fetch_object($query))
	{
		

?>
	<tr>
		<td align="center"><?php echo $i++; ?></td>
		<td><?php echo $row->username; ?></td>
		<td><?php echo $row->email; ?></td>
		<td><?php echo $row->passwd; ?></td>
		<td>
			<a href="manage.php?edited=1&id=<?php echo $row->id;?>"> Edit </a> |
			<a href="manage.php?deleted=1&id=<?php echo $row->id;?>"> Delete </a>
		</td>
	</tr>
<?php	
	}
}
?>
</table>