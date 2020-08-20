<?php
	include('config.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CDN -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		
		<title>PHP CRUD Operation using AJAX & JQuery</title>

	</head>
<body>
		<div class="container mx-auto">
			<div class="row mx-auto">
                <div class="col-md-10 mx-auto mt-5">
                    <center>
						<h2 class = "text-primary">
							PHP - CRUD Operation using AJAX/JQuery
						</h2>
					</center>
					<form>
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" aria-describedby="emailHelp" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" id="password" minlength="6" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" autocomplete="off" required>
						</div>
						<button type="submit" id="addnew" class="btn btn-primary"> Added</button>
					</form>
					
                </div>
            </div>

			<!-- User Table -->
			<div class="row mx-auto mt-5">
				<div class="col-md-10 mx-auto">
					<div id="userTable">
					
					</div>
				</div>
			</div> <!-- End of User Table -->

		</div> <!-- End of Continer -->
	
</body>

<!-- CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<script type = "text/javascript">
	$(document).ready(function(){

		showUser();

		// Add Action

		$(document).on('click', '#addnew', function(){

			if ($('#name').val()=="" || $('#password').val()=="" || $('#email').val()==""){
				
				alert('Please input data first');

			}
			else{

			// get data input from form

			$name=$('#name').val();
			$password=$('#password').val();
			$email=$('#email').val();	
			
			// ajax action to add user

			$.ajax({
				type: "POST",
				url: "add_user.php",
				data: {
					name: $name,
					password: $password,
					email: $email,
					add: 1,
				},
				success: function(){
					showUser();
				}
			});

			} // end of if else

		}); 
		
		// End of Add Action

		// Delete Action

		$(document).on('click', '.delete', function(){

			// get id to delete

			$id=$(this).val();

			$.ajax({
				
				url: "delete_user.php",
				type: "POST",
				data: {
					id: $id,
					del: 1,
				},
				success: function(){
					showUser();
				}
			}); // end of ajax action

		}); 
		
		// End of Delete Action


		// Update Action

		$(document).on('click', '.updateuser', function(){

			// get update value

			$id=$(this).val();
			$('#edit'+$id).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$name=$('#uname'+$id).val();
			$password=$('#upassword'+$id).val();
			$email=$('#uemail'+$id).val();

			$.ajax({
				type: "POST",
				url: "update_user.php",
				data: {
					id: $id,
					name: $name,
					password: $password,
					email: $email,
					edit: 1,
				},
				success: function(){
					showUser();
				}
			}); // end of ajax action
		}); 
		
		// End of Update Action
 
		});
 
	//Show User Table

	function showUser(){
		$.ajax({
			url: 'show_users.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
 
</script>
</html>