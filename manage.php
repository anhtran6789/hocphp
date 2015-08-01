<?php
include('db.php');
$error="";
$id="0";
$username="";
$email="";
$password="";

if(isset($_POST['btnsave']))
{
	$username=$_POST['txt_username'];
	$email=$_POST['txt_email'];
	$password=$_POST['txt_password'];
	if(strlen($username)<6)
	{
		$error="User toi thieu 6 ky tu";
	}
	else
	{
		if($_POST['txtid']=="0")
		{ 
			// thêm mới
		$sql="insert into user(username,email,passwd) values('$username','$email','$passwd')";
		$query=mysql_query($sql);
		if($query)
			{
				header('Refresh:0; view.php');
			}
		} 
	else 
		{
			// sửa
			$sql="update user set username='$username',email='$email',passwd='$passwd' where id='{$_POST['txtid']}'";
			$query=mysql_query($sql);
			if($query)
			{
				header('Refresh:0; view.php');
			}
		}	
	}	
}
if(isset($_GET['edited']))
{
	$sql="select * from user where id='{$_GET['id']}'";
	$query=mysql_query($sql);
	$row=mysql_fetch_object($query);
	$id=$row->id;
	$username=$row->username;
	$email=$row->email;
	$password=$row->passwd;
	
}
if(isset($_GET['deleted']))
{
	$sql="delete from user where id='{$_GET['id']}'";
	$query=mysql_query($sql);
	{
		header('Refresh:0; view.php');
	}
}



?>
<form action="" method="post">
	<table align="center">
	<tr>
		<td colspan="2"><span style="color:red;"><?php echo $error;?></td>
	</tr>
			<th>Add Form</th>
		<tr>
			<td>Username</td>
			<td><input type="text" name="txt_username" value="<?php echo $username; ?>" placeholder="Nhap ten dang nhap"><input type="hidden" name="txtid" value="<?php echo $username; ?>" /></td>
		</tr>
		<tr>
			<td>Email</td>	
			<td><input type="text" name="txt_email" value="<?php echo $email;?>" placeholder="Nhap Email"></td>
		</tr>
		<tr>
			<td>Password</td>	
			<td><input type="text" name="txt_password"></td>
		</tr>
		<td></td>
		<td>
			<input type="submit" value="Save" name="btnsave""> 
		    <input type="submit" value="Clear" name="btnclear"></td>
	</table>



</form>