<?php

	function showdetails($standerd,$rollno)
	{
		include('dbcon.php');
		
		$qry="SELECT * FROM `student` WHERE `standerd`='$standerd' AND `rollno`='$rollno';";
		
		$run = mysqli_query($con,$qry);
		
		if(mysqli_num_rows($run)>0)
		{
			$data=mysqli_fetch_assoc($run);
			?>
				<table border=2 align="center" width=40%>
					<tr>
						<th colspan="3">Student Details</th>
					</tr>
					<tr>
						<td rowspan="5" align="center"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px; "/></td>
						<th>Roll No</th>
						<td><?php echo $data['rollno']; ?></td>
					</tr>
					<tr>
						<th>Name</th>
						<td><?php echo $data['name']; ?></td>
					</tr>
					<tr>
						<th>Standerd</th>
						<td><?php echo $data['standerd']; ?></td>
					</tr>
					<tr>
						<th>Parents Contact No</th>
						<td><?php echo $data['pcontact']; ?></td>
					</tr>
					<tr>
						<th>City</th>
						<td><?php echo $data['city']; ?></td>
					</tr>
				</table>
			<?php
		}
		else
		{
			echo "<tr><td colspan='5' >No Match Found</td></tr>" ;
		}
	}

?>