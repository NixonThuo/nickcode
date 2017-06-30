<?php include('../layout/body_layout.php');?>   
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
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
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
                $id = (int)$_GET['id'];
                $sql = "SELECT * FROM savings where member_id = $id";
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['amount_saved'] . '</td>';
                    echo '<td>' . $row['extra_savings'] . '</td>';
                    echo '<td>' . $row['date_paid'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn btn-primary" href="create_saving.php?id=' . $row['id'] . '">Save</a>';
                    echo ' ';
                    echo '<a class="btn btn-default" href="read_savings.php?id=' . $row['id'] . '">Report</a>';
                    echo ' ';
                    echo '<a class="btn btn-default" href="read_savings.php?id=' . $row['id'] . '">Report</a>';
                    echo ' ';
                    echo '</td>';
                    echo '</tr>';
            }
            Database::disconnect();
          }
          ?>
        </tbody>
      </table>
    </div>
  </div> <!-- /container -->