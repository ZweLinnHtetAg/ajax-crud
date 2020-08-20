<div class="modal fade" id="edit<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <?php
        $n=mysqli_query($conn,"select * from `crudtable` where id='".$user['id']."' and password='".$user['password']."' ");
        $nrow=mysqli_fetch_array($n);
        // if (md5($pass) == $user['password']) {
         
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
            <center><h3 class = "text-success modal-title">Update Member</h3></center>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<form>
		<div class="modal-body">
            <label for="">Name:</label>
		      	<input type="text" value="<?php echo $nrow['name']; ?>" id="uname<?php echo $user['id']; ?>" class="form-control">
            <label for="">Password:</label>
            <input type="text" value="<?php echo base64_decode($nrow['password']); ?>" id="upassword<?php echo $user['id']; ?>" class="form-control">
            <label for="">Email:</label>
            <input type="text" value="<?php echo $nrow['email']; ?>" id="uemail<?php echo $user['id']; ?>" class="form-control"><br>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $user['id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>            
        </div>
		</form>
    </div>
  </div>
</div>