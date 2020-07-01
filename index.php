<?php

if(!isset($_SESSION)){
	session_start();
}

require('controller/frontend.php');



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
				throw new Exception('Aucun identifiants de billets renvoyés');
			}
		}


		elseif($_GET['action']=='addPost'){
			require('view/Backend/addPostView.php'); //mettre dans une fonction
		}


		elseif($_GET['action']=='addPosted'){
			if(!empty($_POST['title']) && !empty($_POST['article'])){
				addNewPost($_POST['title'], $_POST['article']);
			}
		}


		elseif($_GET['action']=='modifyPostPage'){
			require('view/Backend/modifPostView.php'); //mettre dans fonction
		}


		elseif($_GET['action']=='modifyPost'){
			if(!empty($_POST['title']) && !empty($_POST['article'])){
				modifPost($_POST['title'], $_POST['article']);
			}
		}


		elseif($_GET['action']=='deletePost'){
			deletePost();
		}


		elseif($_GET['action']=='addComment'){

			if(isset($_GET['id']) && ($_GET['id']>0)){
				if(!empty($_POST['comment'])){
				addComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
				}
				else{
					throw new Exception ('Tous les champs doivent être remplis');
				}
			}
			else{
				throw new Exception ('Aucun identifiant de  billet envoyés');
			}
		}


		elseif($_GET['action']=='signalComment'){
			signalCom();
		}


		elseif($_GET['action']=='showSignalComment'){
			showSignal();
		}


		elseif($_GET['action']=='deleteComment'){

			deleteCom();
		}


		elseif($_GET['action']=='cancelSignal'){

			cancelSignal();
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
			admin();
		}

		elseif($_GET['action']=='adminPost'){
			listPostsAdmin();
		}

	}



	else{

		listPosts();
	}
}

catch(Exception $e){

	echo 'Erreur: ' . $e->getMessage();
}