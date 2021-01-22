<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php
		if(array_key_exists('d', $_GET) && !empty($_GET['d'])){
			$query = "SELECT id, first_name, last_name, email, gender, nationality FROM register";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			$record = getRecord($query);
			foreach ($record as $drop) {
				$query = "DELETE FROM register WHERE id=".$_GET['d'];
				if(executeDML($query))
				header('location:index.php?P=list');
			}
		}?>
<?php endif; ?>
