<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link   href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<h3>Kawa List of  Members</h3>
		</div>
		<div class="row">
			<p>
				<a href="create_member.php" class="btn btn-success">Create</a>
			</p>
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
					include 'database.php';
					$pdo = Database::connect();
					$sql = 'SELECT * FROM members ORDER BY id DESC';
					foreach ($pdo->query($sql) as $row) {
					echo '<tr>';
					echo '<td>'. $row['first_name'] . '</td>';
					echo '<td>'. $row['second_name'] . '</td>';
					echo '<td>'. $row['id_number'] . '</td>';
					echo '<td>'. $row['mobile'] . '</td>';
					echo '<td width=250>';
                                echo '<a class="btn" href="read_member.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_member.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_member.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
					echo '</tr>';
				}
				Database::disconnect();
				?>
			</tbody>
		</table>
	</div>
</div> <!-- /container -->
</body>
</html>