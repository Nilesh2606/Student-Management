<?php
session_start();
if(isset($_SESSION['uid']))
{
	header('location:admin/admindash.php');
}
?>
<html>
	<head>
		<title>Admin Login</title>
		<style>
			.admin
			{
				text-align:center;
				height:200px;
				width:500px;
				border:2px solid #000;
				margin-left:450px;
				margin-top:50px;
				background-color:#701010;
				color:#fff;
				
			}
			
			.login
			{
				align:center;
				height:102px;
				width:500px;
				padding-top:16px;
				border-top:2px solid #000;
				background-color:#ffff99;
			}
		</style>
	</head>
	<body>
		<div class="admin">
			<h1 align="center" >Admin Login</h1>
			<div class="login">
				<form action="login.php" method="post">
					<table align="center" width=50%>
						<tr>
							<td>Username:</td>
							<td><input type="text" name="username" placeholder="Enter username" required></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="Password" name="Password" placeholder="Enter Password" required></td>
						</tr>
						<tr>
							<td colspan=2 align="center"><input type="submit" name="Login" value="Login"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
<?php 

	include('dbcon.php');
	if(isset($_POST['Login']))
	{
		$username = $_POST['username'];
		$password = $_POST['Password'];
		
		$qry = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password';";
		$run = mysqli_query($con,$qry);
		$row = mysqli_num_rows($run);
		if($row<1)
		{?>
			<script>
				alert(Username and password Invalid!);
				window.open('login.php','_self')
			</script><?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);
			$id = $data['id'];
			
			$_SESSION['uid']=$id;
			header('location:admin\admindash.php');
		}
	}

?>