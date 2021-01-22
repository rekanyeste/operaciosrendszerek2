<?php 
	$query = "SELECT id, first_name, last_name, email, gender, nationality FROM register";
	require_once DATABASE_CONTROLLER;
	$register = getList($query);
?>
	<?php if(count($register) <= 0) : ?>
		<h1>Nincs egy regisztrált felhasználó sem.</h1>
	<?php else : ?>
		<table class="table table-bordered table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Név</th>
					<th scope="col">Email</th>
					<th scope="col">Nem</th>
					<th scope="col">Ország</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($register as $r) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="index.php?P=profil&d=<?=$r['id'] ?>"><?=$r['first_name'] .' '. $r['last_name']?></a></td>
						<td><?=$r['email'] ?></td>
						<td><?=$r['gender'] == 0 ? 'Nő' : ($r['gender'] == 1 ? 'Férfi' : 'Egyéb') ?></td>
						<td><?=$r['nationality'] ?></td>
						<td><a href="index.php?P=edit&d=<?=$r['id'] ?>">Edit</a></td>
						<td><a href="index.php?P=delete&d=<?=$r['id'] ?>">Delete</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
<?php endif; ?>