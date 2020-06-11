<?php

namespace OCR\Blog\Model;

require_once('model/Manager.php');


class PostManager extends Manager
{

	public function getPosts(){
		
		$db=$this->dbConnect();

		$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY creation_date DESC LIMIT 0,5');

		return $req;
	}


	public function getPost($postId){

		$db=$this->dbConnect();

		$req= $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id=?');
		$req->execute(array($postId));
	
		return $req;
	}

}