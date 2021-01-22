<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Off the Cook</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Kezdőlap</a>
      <?php if(!IsUserLoggedIn()) : ?>
      	<a class="nav-item nav-link" href="index.php?P=login">Bejelentkezés</a>
      	<a class="nav-item nav-link" href="index.php?P=register">Regisztráció</a>
      <?php else : ?>
        <a class="nav-item nav-link" href="index.php?P=recipes">Receptek</a>
      	<a class="nav-item nav-link" href="index.php?P=list">Profil</a>

      	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>

		<?php endif; ?>
		<a class="nav-item nav-link" href="index.php?P=logout">Kijelentkezés</a>
      <?php endif; ?>
    </div>
  </div>
</nav>