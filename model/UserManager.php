<?php

namespace OCR\Blog\Model;

require_once('model/Manager.php');



class RegisterManager extends Manager
{

	public function register($registerName, $registerMail, $registerPassword){

		$db=$this->dbConnect();

		$req = $db->prepare('INSERT INTO members (name, mail, password, register_date) VALUES (?, ?, ?, NOW())');
   		$req->execute(array($registerName, $registerMail, $registerPassword));


    	return $req;
    }



    public function verify($registerName, $registerMail){

    	$db=$this->dbConnect();

    	$verif= $db->prepare('SELECT name, mail FROM members WHERE name=? OR mail=?');;
    	$verif->execute(array($registerName, $registerMail));

    	return $verif;
    }
}




class ConnectionManager extends Manager
{

    public function connect($pseudo){
        
        $db=$this->dbConnect();

        $req=$db->prepare('SELECT * FROM members WHERE name=?');
        $req->execute(array($pseudo));

        return $req;
    }

}