<?php
include('db.php');
$error="";//Intent: Tức là em thêm khoảng trắng giữa dầu "=" nhé tương tự với dòng dưới
$id="0";
$username="";
$email="";
$password="";

if(isset($_POST['btnsave']))// Nên dùng if ($_SERVER['REQUEST_METHOD'] === 'POST') { để xem có phải gửi bằng METHOD Post hay không
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
	$id=$row->id;// Phần này em ko cần, mà trong phần form em dùng $row->id thì hợp lý hơn, vì sau này dùng mô hình MVC thì hiển thị cái gì, ở đâu sẽ ở lớp VIEW
	$username=$row->username;// Tương tự ở trên
	$email=$row->email; // Tương tự ở trên
	$password=$row->passwd;// Tương tự ở trên
	
}
if(isset($_GET['deleted'])) // Em thử tìm hiểu cách gửi bằng Request Delete
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
			<td><input type="text" name="txt_password"></td><!-- Password không nên show ra vì thế type = password -->
		</tr>
		<td></td>
		<td>
			<input type="submit" value="Save" name="btnsave""> 
		    <input type="submit" value="Clear" name="btnclear"></td>
	</table>



</form>
