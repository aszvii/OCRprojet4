<?php

namespace OCR\Blog\Model;

require_once('model/Manager.php');


class PostManager extends Manager
{

	public function getPosts(){
		
		$db=$this->dbConnect();

		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date DESC');

		return $req;
	}


	public function getPost($postId){

		$db=$this->dbConnect();

		$req= $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts WHERE id=?');
		$req->execute(array($postId));
	
		return $req;
	}



	public function addPost($postTitle, $postContent){

		$db=$this->dbConnect();

		$req=$db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
		$req->execute(array($postTitle, $postContent));

		return $req;
	}


	public function modifyPost($newPostTitle, $newPostContent, $postId){

		$db=$this->dbConnect();

		$req=$db->prepare('UPDATE posts SET title=?, content=? WHERE id=? ');
		$req->execute(array($newPostTitle, $newPostContent, $postId));


		return $req;
	}


	public function deletePost($postId){

		$db=$this->dbConnect();

		$req=$db->prepare('DELETE FROM posts WHERE id=?');
		$req->execute(array($postId));

		return $req;

	}


}