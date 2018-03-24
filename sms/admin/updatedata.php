<?php

	include('../dbcon.php');
		
		$rollno = $_POST['rollno'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$pcont = $_POST['pcontact'];
		$std = $_POST['std'];
		$id = $_POST['sid'];
		$imgname = $_FILES['img']['name'];
		$tempname = $_FILES['img']['tmp_name'];
		
		move_uploaded_file($tempname,"../dataimg/$imgname");
		
		$qry = "UPDATE  `test`.`student` SET  `rollno` =  '$rollno',
				`name` =  '$name',
				`city` =  '$city',
				`pcontact` =  '$pcont',
				`standerd` =  '$std',
				`image` =  '$imgname' WHERE  `student`.`id` =$id;";

		$run = mysqli_query($con,$qry);
		
		if($run == true)
		{
			?>
			<script>
				alert('Data Updated successfully');
				window.open('updateform.php?sid=<?php echo $id; ?>','_self');
			</script>
			
			<?php
		}
	

?>