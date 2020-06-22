<meta charset="utf-8" />

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
		throw new Exception('L\'id envoyé est incorrect');
	}
	else {
		require('view/Frontend/postView.php');
	}
	
}


function addNewPost($postTitle, $postContent){

	$postManager= new \OCR\Blog\Model\PostManager();

	$req= $postManager->addPost($postTitle, $postContent);

	if($req==false){
		throw new Exception('Impossible d\'ajouter le billet');	
	}
	else{
		header('Location: index.php');
	}
}


function deletePost(){

	$postManager= new \OCR\Blog\Model\PostManager();

	$req= $postManager->deletePost($_GET['id']);

	if($req==false){
		throw new Exception('Impossible de supprimer le billet');
	}
	else{
		header ('Location: index.php');
	}
}


function addComment($postId, $author, $comment){

	$commentManager=new  \OCR\Blog\Model\CommentManager();

	$req = $commentManager->postComment($postId, $author, $comment);

	if($req === false){
		throw new Exception ('Impossible d\'ajouter le commentaire !');
	}
	else{
		header('Location: index.php?action=post&id='. $postId);
	}
}


function modifComment($comment){

	$commentManager=new  \OCR\Blog\Model\CommentManager();

	$req = $commentManager->modifyComment($comment, $_GET['id']);

	if($req==false){
		throw new Exception('Impossible de modifier le commentaire');
	}
	else{
		header('Location: index.php?action=post&id='.$_GET['post']);
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



function deleteCom(){

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $commentManager->deleteComment($_GET['id']);

	if($req==false){
		throw new Exception('Impossible de supprimer le commentaire');
	}
	else{
		header('Location: index.php?action=post&id='. $_GET['post']);
	}
}


function modifyCommentPage(){
	require('view/Frontend/modifyCommentView.php');
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

		$req= $registerManager->register($registerName, $registerMail, $registerPassword);

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

	$req=$connectionManager->connect($pseudo, $pass);

	$resultats=$req->fetch();

	if($req->rowCount()==0){
		throw new Exception('pseudo ou mot de passe incorrect');	
	}
	else{
		
		session_start();
		$_SESSION['id']=$resultats['id'];
		$_SESSION['pseudo']= $pseudo;
		$_SESSION['type']=$resultats['type'];
		
		header ('Location: index.php?action=listPosts');
	}
}



function disconnect(){
	session_destroy();						

	header('Location: index.php');
}