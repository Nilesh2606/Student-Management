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
<div class="abc" style="padding-top:20px;">
	<form action="updatestudent.php" method="post">
		<table align="center" width=60%>
			<tr>
				<td>Enter Standerd</td>
				<td>
					<input type="number" name="standerd" placeholder="enter standerd" required="required">
				</td>
			
				<td>Enter Name</td>
				<td>
					<input type="text" name="stdname" placeholder="enter student name" required="required">
				</td>
			
				<td align="center"><input type="submit" name="Submit" value="Submit" ></td>
			</tr>
		</table>
	</form>
	<table align="center" border="1" width=70%>
		<tr>
			<th>No</th>
			<th>Img</th>
			<th>Name</th>
			<th>Roll No</th>
			<th>Edit</th>
		</tr>
		<?php

			if(isset($_POST['Submit']))
			{	
				include('../dbcon.php');
				
				$standerd = $_POST['standerd'];
				$name = $_POST['stdname'];
				$qry="SELECT * FROM `student` WHERE `standerd`='$standerd' AND `name` LIKE  '%$name%'";
				$run = mysqli_query($con,$qry);
				
				if(mysqli_num_rows($run)<1)
				{
					echo "<tr><td colspan='5'>No record Found</td></tr>";
				}
				else
				{
					$count=0;
					while($data=mysqli_fetch_assoc($run))
					{
						$count++;
						?>
							<tr align="center">
								<td><?php echo $count; ?></td>
								<td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px; height:50px;"></td>
								<td><?php echo $data['name']; ?></td>
								<td><?php echo $data['rollno']; ?> </td>
								<td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
							</tr><?php
					}
				}
			}
		?>
					
</table>
</div>