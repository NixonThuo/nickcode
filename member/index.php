
<?php include('../header/body_layout.php');?>		
<div class="container">
	<div class="row">
		<h3 align="center">Kawa List of  Members</h3>
	</div>
	<div class="row">
		<p>
			<a href="create_member.php" class="btn btn-success">Create</a>
		</p>
		<p>
		<div class="left">
			<form class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" id="search" placeholder="search member">
				</div>
				<button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>
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
				$pdo = Database::connect();
				$sql = 'SELECT * FROM members ORDER BY id DESC';
				foreach ($pdo->query($sql) as $row) {
					echo '<tr>';
					echo '<td>'. $row['first_name'] . '</td>';
					echo '<td>'. $row['second_name'] . '</td>';
					echo '<td>'. $row['id_number'] . '</td>';
					echo '<td>'. $row['mobile'] . '</td>';
					echo '<td width=250>';
					echo '<a class="btn btn-primary" href="read_member.php?id='.$row['id'].'">Read</a>';
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
	<nav aria-label="Page navigation">
		<ul class="pagination">
			<li>
				<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
				<a href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
</div> <!-- /container -->
<?php include('../footers/body_footer.php');?>