<h4>Ossza meg másokkal is receptjeit!</h4>
<br>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['recipes'])) 
	{
		$postData = 
		[
			'nev' => $_POST['nev'],
			'elkeszites' => $_POST['elkeszites']
		];
		if(empty($postData['nev']) || empty($postData['elkeszites'])) 
		{
			echo "Hiányzó adat(ok)!";
		}
	else 
	{
		$query = "INSERT INTO recipes (nev, elkeszites) VALUES (:nev, :elkeszites)";
		$params = 
		[
			[':nev' => $postData['nev']],
			[':elkeszites' => $postData['elkeszites']]
		];
		require_once DATABASE_CONTROLLER;
		if(!executeDML($query, $params)) 
		{
			echo "Hiba az adatbevitel során!";
		}
		header('Location: index.php'); }
	}
?>
	<form class="form-group" method="post">
		<div class="form-row">
			<div class="form-group col-md-6">
				<input type="text" class="form-control" id="recept_nev" name="nev" value="Név...">
			</div>
		</div>
			<div class="form-group">
				<textarea class="form-control" id="recept_elkeszites" rows="3" name="elkeszites" value="Elkészítés..."></textarea>
			</div>
	<button type="submit" class="btn btn-primary mb-2" name="recipes">Küldés</button>
	</form>