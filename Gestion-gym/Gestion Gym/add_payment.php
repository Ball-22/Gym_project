<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['payment'])) {

  $pay_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);
  $gym_id = mysqli_real_escape_string($conn, $_REQUEST['gym_id']);
  
  
  $user_check_query = "SELECT * FROM payment WHERE pay_id='$pay_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['pay_id'] === $pay_id) {
      array_push($errors, "<div class='alert alert-warning'><b>Cet Identifiant Existe</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO payment (pay_id,amount,gym_id) 
          VALUES('$pay_id','$amount','$gym_id')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Payement accepté</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Payement non accepté</b></div>";
    }
  }
}



?>




<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>AJOUT PAYEMENT</h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">ID PAYMENT</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">MONTANT</label>
		<input type="text" name="amount" class="form-control">
		<label class="mt-3">ID GYM</label>
		<input type="text" name="gym_id" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="payment">AJOUTER</button>
	</form>
</div>