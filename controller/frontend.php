<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


function listPosts(){

	$postManager = new \OCR\Blog\Model\PostManager();

	$req=$postManager->getPosts();


	if($req ==false){
		throw new Exception ('Impossible d\'afficher les billets');
	}
	else{

		require('view/Frontend/listPostsView.php');
	}

}



function post(){

	$postManager= new \OCR\Blog\Model\PostManager();

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $postManager->getPost($_GET['id']);


	$comments= $commentManager->getComments($_GET['id']);

	if($req==false || $comments===false){
		throw new Exception('Impossible d\'afficher la page');	
	}
	else if($req->rowCount()==0){
		throw new Exception('Le billet demandé n\'existe pas');
	}
	else {
		require('view/Frontend/postView.php');
	}
	
}




function addComment($author, $comment){

	$commentManager=new  \OCR\Blog\Model\CommentManager();

	$req = $commentManager->postComment($_GET['id'], $author, $comment);

	if($req === false){
		throw new Exception ('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id='. $_GET['id']);
	}
}



function signalCom(){

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $commentManager->signalComment($_GET['id']);

	if($req==false){
		throw new Exception('Impossible de signaler le commentaire');
	}
	else{
		header('Location: index.php?action=post&id='.$_GET['post']);
	}
}



function register(){
	require('view/Frontend/registerView.php');
}



function addMember($registerName, $registerMail, $registerPassword){

	$registerManager= new \OCR\Blog\Model\RegisterManager();

	$verif=$registerManager->verify($registerName, $registerMail);

	if($verif==false){
		throw new Exception('Impossible de créer le compte');
	}

	elseif($verif->rowCount()==0){

		$req= $registerManager->register($registerName, $registerMail, password_hash($registerPassword, PASSWORD_DEFAULT));

		if($req==false){
			throw new Exception('Impossible de créer le compte');
		}
		else{
			header('Location: index.php?action=connect');
		}
	}

	else{
		throw new Exception('Un compte à déjà été créé avec ce pseudo ou cette adresse mail');
	}
	
}


function connect(){
	require('view/Frontend/connectionView.php');
}




function connection($pseudo, $pass){

	$connectionManager= new \OCR\Blog\Model\ConnectionManager();

	$req=$connectionManager->connect($pseudo);

	$resultat=$req->fetch();

	$isPasswordCorrect= password_verify($pass, $resultat['password']);                  

	if(!$resultat){
		throw new Exception("Mauvais identifiants");
	}
	
	else{

		if($isPasswordCorrect){

			session_start();
			$_SESSION['id']=$resultat['id'];
			$_SESSION['pseudo']= $pseudo;
			$_SESSION['type']=$resultat['type'];
		
			header ('Location: index.php?action=listPosts');	
		}
		else{
			throw new Exception("Mot de passe incorrect");
		}
	}

}



function disconnect(){
	session_destroy();						

	header('Location: index.php');
}


