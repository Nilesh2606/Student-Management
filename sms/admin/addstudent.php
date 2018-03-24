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
?>
<div class="abc" style="padding-top:30px;">
	<form action="addstudent.php" method="post" enctype="multipart/form-data">
		<table border=2 align="center">
			<tr>
				<td>Roll No</td>
				<td><input type="taxt" name="rollno" placeholder="Enter Roll No." required></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="taxt" name="name" placeholder="Enter Name." required></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="taxt" name="city" placeholder="Enter City" required></td>
			</tr>
			<tr>
				<td>Parents Conatct No.</td>
				<td><input type="taxt" name="pcontact" placeholder="Enter Parents Conatct No." required></td>
			</tr>
			<tr>
				<td>Standerd</td>
				<td><input type="number" name="std" placeholder="Enter Standerd" required></td>
			</tr>
			<tr>
				<td>image</td>
				<td><input type="file" name="img" required></td>
			</tr>
			<tr>
				<td colspan=2 align="center"><input type="submit" name="Submit" value="Submit" ></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>


<?php 
	if(isset($_POST['Submit']))
	{
		include('../dbcon.php');
		
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcont = $_POST['pcontact'];
		$std = $_POST['std'];
		$imgname = '25252.jpg';
		$tempname = $_FILES['img']['tmp_name'];
		
		move_uploaded_file($tempname,"../dataimg/$imgname");
		
		$qry = "INSERT INTO `student`(`rollno`, `name`, `city`, `pcontact`, `standerd`, `image`) VALUES ('$rollno','$name','$city','$pcont','$std','$imgname')";

		$run = mysqli_query($con,$qry);
		
		if($run == true)
		{
			?>
			<script>alert('Data inserted successfully');</script>
			<?php
		}
	
	}
?>