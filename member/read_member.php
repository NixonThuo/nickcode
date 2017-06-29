<?php
require '../database/database.php';
$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( null==$id ) {
  header("Location: index.php");
} else {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM members where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();
}
?>

<?php include('../layout/body_layout.php');?>   
<div class="container">

  <div class="span10 offset1">
    <div class="row">
      <h3>Member Details</h3>
    </div>

    <form class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $data['first_name'];?></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Second Name</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $data['second_name'];?></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">ID Number</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $data['id_number'];?></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Mobile Number</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $data['mobile'];?></p>
        </div>
      </div>
      <div class="form-actions">
        <a class="btn btn-default" href="index.php">Back</a>
      </div>
    </form>
  </div>
</div>
<!-- /container -->