<?php 

session_start();
			
	if(isset($_SESSION['uid']))
	{
		echo "";
	}
	else
	{
		header('location: ../login.php');
	}

?>
<?php
	include('header.php');
	include('titlehead.php');
	include('../dbcon.php');
	
	$sid = $_GET['sid'];
	
	$sql = "SELECT * FROM `student` WHERE `id`='$sid'";
	$run = mysqli_query($con,$sql);
	
	$data = mysqli_fetch_assoc($run);
?>
<div class="abc" style="padding-top:30px;">
	<form action="updatedata.php" method="post" enctype="multipart/form-data">
		<table border=2 align="center">
			<tr>
				<td>Roll No</td>
				<td><input type="taxt" name="rollno" value=<?php echo $data['rollno']; ?> required></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="taxt" name="name" value=<?php echo $data['name']; ?> required></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="taxt" name="city" value=<?php echo $data['city']; ?> required></td>
			</tr>
			<tr>
				<td>Parents Conatct No.</td>
				<td><input type="taxt" name="pcontact" value=<?php echo $data['pcontact']; ?> required></td>
			</tr>
			<tr>
				<td>Standerd</td>
				<td><input type="number" name="std" value=<?php echo $data['standerd']; ?> required></td>
			</tr>
			<tr>
				<td>image</td>
				<td><input type="file" name="img" required></td>
			</tr>
			<tr>
				<td colspan=2 align="center">
					<input type="hidden" name="sid" value="<?php echo $data['id']; ?>"  />
					<input type="submit" name="Submit" value="Submit" >
				</td>
			</tr>
		</table>
	</form>
</div>