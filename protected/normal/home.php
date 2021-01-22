<?php if (!IsUserLoggedIn()): ?>
<link rel="stylesheet" type="text/css" href="<?=PUBLIC_DIR.'style.css?'.date('YmdHis', filemtime(PUBLIC_DIR.'style.css'))?>">
<h1>Üdvözlöm az Off the Cook oldalon!</h1>
<br>
<h3>Pár mondat az oldalról és a szerzőről</h3>
<img src="profil.jpg" alt="profil">
<br>
<p>Sziasztok! Nyeste Rékának hívnak és elsőéves hallgató vagyok az Eszterházy Károly Egyetem programtervező informatikus szakán.</p>
<p>Egy iskolai feladat révén hoztam létre ezt az oldalt.</p>
<p>Azért választottam ezt a témakört, mert szeretek sütni, főzni, új dolgokat, recepteket kipróbálni.</p>
<p>Remélem elnyeri a tetszéseteket mind az oldal, mind a receptek!</p>
<?php endif; ?>