<?php include('../header/body_layout.php');?>	
<?php
if ( !empty($_POST)) {
// keep track validation errors
	$first_nameError = null;
	$second_nameError = null;
	$id_numberError = null;
	$mobileError = null;

// keep track post values
	$first_name = $_POST['first_name'];
	$second_name = $_POST['second_name'];
	$id_number = $_POST['id_number'];
	$mobile = $_POST['mobile'];

// validate input
	$valid = true;
	if (empty($first_name)) {
		$first_nameError = 'Please enter First Name';
		$valid = false;
	}

	if (empty($second_name)) {
		$second_nameError = 'Please enter Second Name';
		$valid = false;
	}

	if (empty($id_number)) {
		$id_numberError = 'Please enter ID NUMBER';
		$valid = false;
	} else if ( strlen($id_number) < 5 ) {
		$id_numberError = 'Your ID Number is less than 5 digits';
		$valid = false;
	}

	if (empty($mobile)) {
		$mobileError = 'Please enter Mobile Number';
		$valid = false;
	} else if ( !preg_match('/(7|8|9)\d{9}/', $mobile)) {
		$mobileError = 'Enter Valid Mobile Number'; 
	}


// insert data
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO members (first_name,second_name,id_number,mobile) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($first_name,$second_name,$id_number,$mobile));
		Database::disconnect();
		header("Location: index.php");
	}
}
?>
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Create Member</h3>
		</div>

		<form class="form-group col-md-4" action="create_member.php" method="post">
			<div class="form-group <?php echo !empty($first_nameError)?'error':'';?>">
				<label class="control-label">First name</label>
				<div class="form-group">
					<input class="form-control" name="first_name" type="text"  placeholder="First Name" value="<?php echo !empty($first_name)?$first_name:'';?>">
					<?php if (!empty($first_nameError)): ?>
						<span class="help-inline"><?php echo $first_nameError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="form-group <?php echo !empty($second_nameError)?'error':'';?>">
				<label class="form-group">Second Name</label>
				<div class="form-group">
					<input  class="form-control" name="second_name" type="text"  placeholder="Name" value="<?php echo !empty($second_name)?$second_name:'';?>">
					<?php if (!empty($second_nameError)): ?>
						<span class="help-inline"><?php echo $second_nameError;?></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="form-group <?php echo !empty($id_numberError)?'error':'';?>">
				<label class="form-group">ID Number</label>
				<div class="controls">
					<input class="form-control" name="id_number" type="text" placeholder="ID Number" value="<?php echo !empty($id_number)?$id_number:'';?>">
					<?php if (!empty($id_numberError)): ?>
						<span class="help-inline"><?php echo $id_numberError;?></span>
					<?php endif;?>
				</div>
			</div>
			<div class="form-group <?php echo !empty($mobileError)?'error':'';?>">
				<label class="control-label">Mobile Number</label>
				<div class="controls">
					<input  class="form-control" name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					<?php if (!empty($mobileError)): ?>
						<span class="help-inline"><?php echo $mobileError;?></span>
					<?php endif;?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Create</button>
				<a class="btn" href="index.php">Back</a>
			</div>
		</form>
	</div>
</div> <!-- /container -->