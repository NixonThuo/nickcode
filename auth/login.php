<?php

require '../database/database.php';


if(isset($_GET['action'])){

	//check the action
	switch ($_GET['action']) {
		case 'active':
		echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
		break;
		case 'reset':
		echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
		break;
		case 'resetAccount':
		echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
		break;
	}

}

//process login form if submitted
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 

		header('Location: ../member');
		exit;

	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
	}
}	

?> 
<?php include('../header/auth_layout.php');?>  
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Login</h3>
		</div>
		<form role="form" method="post" action="" autocomplete="off">

			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
			</div>

			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
			</div>

			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9">
					<a href='#'>Forgot your Password?</a>
				</div>
			</div>

			<hr>
			<div class="row">
				<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
			</div>
		</form>
	</div>
</div>
