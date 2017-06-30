<?php
    require '../database/database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $amount_savedError = null;
        $extra_savingsError = null;
        $date_paidError = null;

        // Define member and extra savings
        $member_id = $id;
        $extra_savings = 0;
    

        // keep track post values
        $amount_saved = $_POST['amount_saved'];
        $date_paid = $_POST['date_paid'];
        $limit = 700;

        //Process amount saved
        if ($amount_saved >= $limit) {
       		$extra_savings = $amount_saved - $limit;
            $amount_saved = $limit;
        }
         
        // validate input
        $valid = true;
        if (empty($amount_saved)):
            $amount_savedError = 'Please enter amount saved';
            $valid = false;
        elseif ($amount_saved < $limit):
            	$amount_savedError = 'Amount Saved Should be 700 or more';
            	$valid = false; 
        else:
        endif;
         
        if (empty($date_paid)) {
          $date_paidError = 'Please select date paid';
          $valid = false;
        }
        


        // save data
       if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO savings (amount_saved,member_id,extra_savings,date_paid) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($amount_saved,$member_id,$extra_savings,$date_paid));
		Database::disconnect();
		header("Location: index.php");
		}
	} 
?>
<?php include('../layout/body_layout.php');?>
<div class="container">

  <div class="span10 offset1">
    <div class="row">
      <h3>Make Savings</h3>
    </div>

    <form class="form-horizontal col-md-4" action="create_saving.php?id=<?php echo $id?>" method="post">
      <div class="form-group <?php echo !empty($amount_savedError)?'error':'';?>">
        <label class="control-label">Amount Saved</label>
        <div class="controls">
        <div class="input-group">
        <div class="input-group-addon">Ksh</div>
          <input  class="form-control" name="amount_saved" type="text"  placeholder="amount saved" value="<?php echo !empty($amount_saved)?$amount_saved:'';?>">
          <?php if (!empty($amount_savedError)): ?>
            <span class="help-inline"><?php echo $amount_savedError;?></span>
          <?php endif; ?>
          <div class="input-group-addon">.00</div>
        </div>
        </div>
      </div>
      <div class="form-group <?php echo !empty($date_paidError)?'error':'';?>">
        <label class="control-label">Date Paid</label>
        <div class="controls">
          <input class="form-control" name="date_paid" type="date" placeholder="date_paid" value="<?php echo !empty($date_paid)?$date_paidError:'';?>">
          <?php if (!empty($date_paidError)): ?>
            <span class="help-inline"><?php echo $date_paidError;?></span>
          <?php endif;?>
        </div>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-success">Save</button>
        <a class="btn" href="index.php">Back</a>
      </div>
    </form>
  </div>

</div> <!-- /container -->