<?php

try{
	$bdd= new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e){
	die('Erreur : ' . $e->getMessage());
}



$req = $bdd ->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES (?, ?, ?, NOW())');
$req->execute(array($_GET['billet'],$_POST['pseudo'], $_POST['message']));


header ('Location: commentaires.php?billet='.$_GET['billet']);


?>