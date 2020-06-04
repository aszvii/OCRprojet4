<?php

require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0){

	$req= getPost($_GET['id']);
	$comments= getComments($_GET['id']);


	require('postView.php');

}
else{

	echo 'Erreur: Aucun id de billet renvoyé';
}