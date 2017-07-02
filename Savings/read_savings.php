<?php include('../header/body_layout.php');?>   
<div class="container">
  <div class="row">
    <h3 align="center">Savings</h3>
</div>
<div class="row">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Amount</th>
          <th>Extra Savings</th>
          <th>Date Paid</th>
      </tr>
  </thead>
  <tbody>
    <?php
    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
  }

  if ( null==$id ) {
      header("Location: index.php");
  } else {
    $pdo = Database::connect();
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM savings where member_id = $id";
    foreach ($pdo->query($sql) as $row) {
        echo '<tr>';
        echo '<td>' . $row['amount_saved'] . '</td>';
        echo '<td>' . $row['extra_savings'] . '</td>';
        echo '<td>' . $row['date_paid'] . '</td>';
    }
    Database::disconnect();
}
?>
</tbody>
</table>
<div class="form-actions">
    <a class="btn btn-default" href="index.php">Back</a>
</div>
</div>
  </div> <!-- /container -->