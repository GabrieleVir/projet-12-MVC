<?php
	define('CONTROLLERS', 'controller/class.');
	define('VIEWS', 'views/pages/');

	session_start();

	require_once(CONTROLLERS . 'User.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Slide exercice</title>
</head>
<body>
	<?php
	//Tous les includes pour le contenu se font içi, raison pour laquelle il n'y a pas besoin de faire des session_start partout

	//Si il n'est pas connecté, l'envoyer sur inconnu.php sinon sur member.php  
	if(!array_key_exists('logged', $_SESSION)){
		include (VIEWS . 'inconnu.php');
	} else {
		include (VIEWS . 'member.php');
	}

	?>

	<a href="<?php if($user->is_loggedin()) { echo VIEWS . 'admin.php'; } else{ echo 'index.php';} ?>"><button>Admin</button></a>	
	<a href="index.php"><button>Acceuil</button></a>	
	
</body>
</html>