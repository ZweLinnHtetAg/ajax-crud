 <?php

    include('config.php');
    
	if(isset($_POST['add'])){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        if (strlen($password) < 6)
        {
         return  "Input is too short, minimum is 6 characters (20 max).";
        }
    
        $hash = base64_encode(($password));
	    $sql = "insert into `crudtable` (name, password, email) values ('$name', '$hash', '$email')";
		mysqli_query($conn,$sql);
    }

    else {
        header('location:index.php');
    }
    
?>