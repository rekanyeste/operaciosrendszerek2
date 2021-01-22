<?php 
if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';

switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;

	case 'recipes': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/recipes.php' : header('Location: index.php'); break;

	case 'profil': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/profil.php' : header('Location: index.php'); break;

	case 'delete': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/delete.php' : header('Location: index.php'); break;

	case 'edit': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/edit.php' : header('Location: index.php'); break;

	case 'list': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/list.php' : header('Location: index.php'); break;

	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

	case 'userpanel': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/userpanel.php' : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}

?>