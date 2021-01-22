<?php 
$query = "SELECT id, first_name, last_name, email, gender, nationality FROM register WHERE id = :id";
$params = [':id' => $_GET['d']];
require_once DATABASE_CONTROLLER;
$register = getList($query, $params);
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editUser'])) {
		$postData = [
			':id' => $_GET['d'],
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'email' => $_POST['email'],
			'gender' => $_POST['gender'],
			'nationality' => $_POST['nationality']
		];

		if(empty($postData['first_name']) || empty($postData['last_name']) || empty($postData['email']) || empty($postData['nationality']) || $postData['gender'] < 0 && $postData['gender'] > 2) {
			echo "Hiányzó adat(ok)!";
		} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
			echo "Hibás email formátum!";
		} else {
			$query = "UPDATE register SET id = :id, first_name = :first_name, last_name = :last_name, email = :email, gender = :gender, nationality = :nationality WHERE id = :id";
			$params = [
				':id' => $_GET['d'],
				':first_name' => $postData['first_name'],
				':last_name' => $postData['last_name'],
				':email' => $postData['email'],
				':gender' => $postData['gender'],
				':nationality' => $postData['nationality']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: index.php?P=list');
		}
	}
	?>
<?php foreach ($register as $r) : ?>
<form method="post">
			<div>
				<label for="userID"></label>
				<input type="hidden" class="form-control" id="userID" name="id" value="<?=$r['id']?>">
			</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="editFirstName">Vezetéknév</label>
				<input type="text" class="form-control" id="editFirstName" name="first_name" value="<?=$r['first_name']?>">
			</div>
			<div class="form-group col-md-6">
				<label for="editLastName">Keresztnév</label>
				<input type="text" class="form-control" id="editLastName" name="last_name" value="<?=$r['last_name']?>">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="editEmail">Email</label>
				<input type="email" class="form-control" id="editEmail" name="email" value="<?=$r['email']?>">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
		    	<label for="editGender">Nem</label>
		    	<select class="form-control" id="editGender" name="gender" value="<?=$r['gender']?>">
		      		<option value="0">Nő</option>
		      		<option value="1">Férfi</option>
		      		<option value="2">Egyéb</option>
		    	</select>
		  	</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="editNationality">Ország</label>
				<input type="text" class="form-control" id="editNationality" name="nationality" value="<?=$r['nationality']?>">
			</div>
		</div>
		<button type="submit" class="btn btn-primary" name="modifyUser">Mentés</button>
	</form>
<?php endforeach;?>
