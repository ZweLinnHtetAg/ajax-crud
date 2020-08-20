<?php

	include('config.php');
	if(isset($_POST['show'])){

?>
	<table class = "table table-bordered table-hover">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th></th>
		</thead>
		<tbody>
			<?php
			
			$users=mysqli_query($conn,"select * from `crudtable`");
			while($user=mysqli_fetch_array($users))
			{

			?>
				<tr>
					<td>
						<?php echo $user['name']; ?>
					</td>
					<td>
						<?php echo $user['email']; ?>
					</td>
					<td>
						<button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $user['id']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button>
						<button class="btn btn-danger delete" value="<?php echo $user['id']; ?>" ><span class = "glyphicon glyphicon-trash"></span> Delete</button>
					<?php include('edit_modal.php'); ?>
					</td>
				</tr>
			<?php

				}

			?>
		</tbody>
	</table>
	
<?php

	}
 
?>