<?php 
	$query = "SELECT id, first_name, last_name, email, gender, nationality FROM register WHERE id = :id";
	$params = [':id' => $_GET['d']];
	require_once DATABASE_CONTROLLER;
	$register = getList($query, $params);
?>
	<table class="table table-bordered table-dark">
		<thead>
			<tr>
				<td>Név:</td>
				<td>Email:</td>
				<td>Nem:</td>
				<td>Ország:</td>
			</tr>
		</thead>
			<?php foreach ($register as $r) : ?>
				<tbody>
					<tr>
						<td><?=$r['first_name'] .' '. $r['last_name']?></td>
						<td><?=$r['email'] ?></td>
						<td><?=$r['gender'] == 0 ? 'Nő' : ($r['gender'] == 1 ? 'Férfi' : 'Egyéb') ?></td>
						<td><?=$r['nationality'] ?></td>
					</tr>
				</tbody>
			<?php endforeach;?>
	</table>