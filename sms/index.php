<html>
	<head>
		<meta charset="UTF-8">
		<title>Student Managment System</title>
		<style>
			.head
			{
				background-color:#701010;
				color:#fff;
				margin-left:70px;
				margin-right:70px;
				height:150px;
			}
			
			.body
			{
				background-color:#ffff99;
				color:#999;
				margin-left:70px;
				margin-right:70px;
				height:120px;
				padding-top:20px;
				padding-bottom:20px
			}
			
			.details
			{
				background-color:#ffff99;
				color:#999;
				margin-left:70px;
				margin-right:70px;
				height:180px;
				padding-top:20px;
				padding-bottom:20px
			}
		</style>
	</head>
	<body>
		<div class="head">
			<h5 align="right" style="margin-right:50px; padding-top:20px; "><a href="login.php" style="font-size:20px; color:#fff;">Admin Login</a></h5>
			<h1 align="center">Welcome to Managment System</h1>
		</div>
		<div class="body">
			<form method="post" action="index.php">
				<table align="center" width=30% border=2 >
					<tr align="center">
						<td colspan=2>Student Information</td>
					</tr>
					<tr>
						<td align="left">Choose Standerd</td>
						<td>
							<select name=standerd>
								<option value="1">1st</option>
								<option value="2">2nd</option>
								<option value="3">3rd</option>
								<option value="4">4th</option>
								<option value="5">5th</option>
								<option value="6">6th</option>
								<option value="7">7th</option>
								<option value="8">8th</option>
								<option value="9">9th</option>
								<option value="10">10th</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="left">Enter Rollno</td>
						<td><input type="text" name="RollNo" required></td>
					</tr>
					<tr align="center">
						<td colspan=2><input type="Submit" name="submit" value="Show Information"></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
<div class="details">
<?php

	if(isset($_POST['submit']))
	{
		$standerd = $_POST['standerd'];
		$rollno = $_POST['RollNo'];
		
		include('dbcon.php');
		include('function.php');
		
		showdetails($standerd,$rollno);
	}

?>
</div>