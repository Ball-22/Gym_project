<?php
require('db.php');

if (isset($_REQUEST['gym'])) {
  $gym_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $type = mysqli_real_escape_string($conn, $_REQUEST['type']);


  $update_query="update gym set gym_id='$gym_id',gym_name='$name',address='$address',type='$type' where gym_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Details Gym Mis à Jour</b></div>";
}
$con=mysqli_query($conn,"select * from gym where gym_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  


?>






<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>METTRE A JOUR GYM</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">ID GYM</label>
		<input type="text" name="id" value="<?php echo @$res['gym_id'];?>" class="form-control">
		<label class="mt-3">NOM GYM</label>
		<input type="text" name="name" value="<?php echo @$res['gym_name'];?>" class="form-control">
		<label class="mt-3">ADDRESSE GYM</label>
		<input type="text" name="address" value="<?php echo @$res['address'];?>" class="form-control">
		<label class="mt-3">TYPE GYM</label>
		<input type="text" name="type" value="<?php echo @$res['type'];?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="gym">METTRE A JOUR</button>
	</form>
</div>