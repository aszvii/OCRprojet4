<?php


require_once('model/PostManager.php');
require_once('model/CommentManager.php');




function addPostPage(){                                
	require('view/Backend/addPostView.php');
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


function modifPostPage(){                                 
	$postManager= new \OCR\Blog\Model\PostManager();

	$article= $postManager->getPost($_GET['id']);

	$resultats=$article->fetch();

	if($article==false){
		throw new Exception('Impossible d\'ouvrir la page');	
	}
	elseif($article->rowCount()==0){
		throw new Exception('L\'article que vous souhaitez modifier n\'existe pas');	
	}
	else{
		require('view/Backend/modifPostView.php');
	}
}


function modifPost($newPostTitle, $newPostContent){          

	$postManager= new \OCR\Blog\Model\PostManager();

	$req= $postManager->modifyPost($newPostTitle, $newPostContent, $_GET['id']);

	if($req==false){
		throw new Exception('Impossible de modifier le billet');	
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


function deletePostAdmin(){                                  

	$postManager= new \OCR\Blog\Model\PostManager();

	$req= $postManager->deletePost($_GET['id']);

	if($req==false){
		throw new Exception('Impossible de supprimer le billet');
	}
	else{
		header ('Location: index.php?action=adminPost');
	}
}






function cancelSignal(){                                              

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $commentManager->cancelSignal($_GET['id']);

	if($req==false){
		throw new Exception('Impossible de retirer le signalement');
	}
	else{
		header('Location: index.php?action=showSignalComment');
	}
}


function showSignal(){                                                 

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $commentManager->showSignalComment();

	if($req==false){
		throw new Exception('Impossible d\'afficher les commentaires signalés');		
	}
	else{
		require('view/Backend/signalComView.php');

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


function deleteComAdmin(){                                       

	$commentManager= new \OCR\Blog\Model\CommentManager();

	$req= $commentManager->deleteComment($_GET['id']);

	if($req==false){
		throw new Exception('Impossible de supprimer le commentaire');
	}
	else{
		header('Location: index.php?action=showSignalComment');
	}
}




function admin(){                                      
	require('view/Backend/adminView.php');
}


function listPostsAdmin(){                                          

	$postManager = new \OCR\Blog\Model\PostManager();

	$req=$postManager->getPosts();


	if($req ==false){
		throw new Exception ('Impossible d\'afficher les billets');
	}
	else{
		require('view/Backend/adminPostView.php');
	}
}