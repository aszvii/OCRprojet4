<?php

if(!isset($_SESSION)){
	session_start();
}

require('controller/frontend.php');
require('controller/backend.php');



try{
	
	if(isset($_GET['action'])){

		if($_GET['action']=='listPosts'){

			listPosts();
		}

		elseif($_GET['action']=='post'){

			if(isset($_GET['id']) && $_GET['id'] > 0){

				post();
			}
			else{
				throw new Exception('Aucun identifiants de billets renvoyé');
			}
		}


		elseif($_GET['action']=='addPost'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				addPostPage();
			}
			else{
				throw new Exception('Vous n\'avez pas les droits pour accéder à cette rubrique');
				
			}
		}


		elseif($_GET['action']=='addPosted'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(!empty($_POST['title']) && !empty($_POST['article'])){
					addNewPost($_POST['title'], $_POST['article']);
				}
				else{
					throw new Exception('Veuillez remplir tous les champs pour ajouter un article');
				}
			}
			else{
				throw new Exception('Vous n\'avez pas les droits pour ajouter un article');
				
			}
			
		}


		elseif($_GET['action']=='modifyPostPage'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(isset($_GET['id']) && $_GET['id']>0){
					modifPostPage();
				}
				else{
					throw new Exception('Aucun id d\'article à modifier n\'a été envoyé');	
				}
			}
			else{
				throw new Exception('Vous n\'avez pas les droits pour accéder à cette rubrique');
				
			}
		}


		elseif($_GET['action']=='modifyPost'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(!empty($_POST['title']) && !empty($_POST['article']) && isset($_GET['id'])){
					modifPost($_POST['title'], $_POST['article']);
				}
			}
			
		}


		elseif($_GET['action']=='deletePost'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(isset($_GET['id'])){
					deletePost();
				}
				else{
					throw new Exception('Aucun id de billet envoyé');		
				}
			}
			else{
				throw new Exception('Vous n\'avez pas les droits pour supprimer cet article');	
			}
		}



		elseif($_GET['action']=='deletePostAdmin'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(isset($_GET['id'])){
					deletePostAdmin();
				}
			}
			else{
				throw new Exception('action non autorisée');	
			}
		}


		elseif($_GET['action']=='addComment'){
			if(isset($_SESSION['id'])){
				if(isset($_GET['id']) && ($_GET['id']>0)){
					if(!empty($_POST['comment'])){
						addComment($_SESSION['id'], htmlspecialchars($_POST['comment']));
					}
					else{
						throw new Exception ('Tous les champs doivent être remplis');
					}
				}
				else{
					throw new Exception ('Aucun identifiant de billet envoyé');
				}
			}
			else{
				throw new Exception('Action non autorisée');
				
			}

		}


		elseif($_GET['action']=='signalComment'){
			if(isset($_SESSION['id'])){
				if(isset($_GET['id'])){
					signalCom();
				}
				else{
					throw new Exception('Aucun commentaire à signaler');
				}
			}
			else {
				throw new Exception('action non autorisée');
			}
			
		}


		elseif($_GET['action']=='showSignalComment'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				showSignal();
			}
			else{
				throw new Exception('Vous n\'avez pas les droits pour accéder à cette rubrique');
			}
		}


		elseif($_GET['action']=='deleteComment'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(isset($_GET['id'])){
					deleteCom();
				}
				else{
					throw new Exception('Aucun commentaire sélectionné');
				}
			}
			else {
				throw new Exception('action non autorisée');
			}
			
		}



		elseif($_GET['action']=='deleteCommentAdmin'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(isset($_GET['id'])){
					deleteComAdmin();
				}
				else{
					throw new Exception('Aucun commentaire sélectionné');
				}
			}
			else {
				throw new Exception('action non autorisée');
			}
		}


		elseif($_GET['action']=='cancelSignal'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				if(isset($_GET['id'])){
					cancelSignal();
				}
				else{
					throw new Exception('Aucun commentaire selectionné');
				}
			}
			else{
				throw new Exception('action non autorisée');
			}
		}


		elseif($_GET['action']=='register'){
			register(); 
		}


		elseif($_GET['action']=='disconnect'){
			disconnect();
		
		}


		elseif($_GET['action']=='addMember'){

			if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])){

				if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
					
					addMember($_POST['pseudo'], $_POST['mail'], $_POST['password']);	
				}
				else{
					throw new Exception('Veuillez entrer une adresse email valide');
					
				}
			}
			else{
				throw new Exception('Veuillez remplir tous les champs pour créer un compte');
				
			}
		}


		elseif($_GET['action']=='connect'){
			connect();
		}


		elseif($_GET['action']=='connection'){
			if (!empty($_POST['pseudo']) && !empty($_POST['password'])){
				connection($_POST['pseudo'], $_POST['password']);
			}
			else{
				throw new Exception ('Veuillez remplir tous les champs');
			}
		}


		elseif($_GET['action']=='admin'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				admin();
			}
			else{
				throw new Exception('vous n\'avez pas droits pour accéder à cette rubrique');
			}
		}

		elseif($_GET['action']=='adminPost'){
			if(isset($_SESSION['type']) && ($_SESSION['type']==1)){
				listPostsAdmin();
			}
			else{
				throw new Exception('Vous n\'avez pas les droits pour accéder à cette rubrique');
			}
		}

	}



	else{

		listPosts();
	}
}

catch(Exception $e){

	require('view/Frontend/templateError.php');
}