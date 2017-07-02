<?php include('../header/body_layout.php');?>
<?php

$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( null==$id ) {
  header("Location: index.php");
}

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
    $nameError = 'Please enter First Name';
    $valid = false;
  }

  $valid = true;
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
  }

        // update data
  if ($valid) {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE members  set first_name = ?, second_name = ?, id_number = ?, mobile =? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($first_name,$second_name,$id_number,$mobile,$id));
    Database::disconnect();
    header("Location: index.php");
  }
} else {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM members where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $first_name = $data['first_name'];
  $second_name = $data['second_name'];
  $id_number = $data['id_number'];
  $mobile = $data['mobile'];
  Database::disconnect();
}   
?>
<div class="container">

  <div class="span10 offset1">
    <div class="row">
      <h3>Update a Member</h3>
    </div>

    <form class="form-horizontal col-md-4" action="update_member.php?id=<?php echo $id?>" method="post">
      <div class="form-group <?php echo !empty($first_nameError)?'error':'';?>">
        <label class="control-label">First Name</label>
        <div class="controls">
          <input  class="form-control" name="first_name" type="text"  placeholder="First Name" value="<?php echo !empty($first_name)?$first_name:'';?>">
          <?php if (!empty($first_nameError)): ?>
            <span class="help-inline"><?php echo $first_nameError;?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group <?php echo !empty($second_nameError)?'error':'';?>">
        <label class="control-label">Second Name</label>
        <div class="controls">
          <input class="form-control" name="second_name" type="text"  placeholder="Second Name" value="<?php echo !empty($second_name)?$second_name:'';?>">
          <?php if (!empty($second_nameError)): ?>
            <span class="help-inline"><?php echo $second_nameError;?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group <?php echo !empty($id_numberError)?'error':'';?>">
        <label class="control-label">ID Number</label>
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
          <input class="form-control"  name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
          <?php if (!empty($mobileError)): ?>
            <span class="help-inline"><?php echo $mobileError;?></span>
          <?php endif;?>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-success">Update</button>
        <a class="btn" href="index.php">Back</a>
      </div>
    </form>
  </div>

</div> <!-- /container -->