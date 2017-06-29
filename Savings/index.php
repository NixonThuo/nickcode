
<?php include('../layout/body_layout.php');?>		
<div class="container">
	<div class="row">
		<h3 align="center">Select Member Who is Saving</h3>
	</div>
	<div class="row">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Second Name</th>
					<th>ID Number</th>
					<th>Mobile Number</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include '../database/database.php';
				$pdo = Database::connect();
				$sql = 'SELECT * FROM members ORDER BY id DESC';
				foreach ($pdo->query($sql) as $row) {
					echo '<tr>';
					echo '<td>'. $row['first_name'] . '</td>';
					echo '<td>'. $row['second_name'] . '</td>';
					echo '<td>'. $row['id_number'] . '</td>';
					echo '<td>'. $row['mobile'] . '</td>';
					echo '<td width=250>';
					echo '<a class="btn btn-primary" href="create_saving.php?id='.$row['id'].'">Save</a>';
					echo ' ';
					echo '</td>';
					echo '</tr>';
				}
				Database::disconnect();
				?>
			</tbody>
		</table>
	</div>
</div> <!-- /container -->
<?php include('../footers/body_footer.php');?>