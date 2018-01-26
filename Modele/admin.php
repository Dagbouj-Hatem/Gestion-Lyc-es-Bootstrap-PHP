<?php
	class admin
	{
		private $nom;
		private $prenom;
		private $mail;
		private $login;
		private $pass;
		private $type; 
		
		function __construct($nom,$prenom,$mail,$login,$pass)
		{
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->mail=$mail;
			$this->login=$login;
			$this->pass=$pass;
		}
		
		function setNom($nom)
		{
			$this->nom=$nom;
		}
		
		function setPrenom($prenom)
		{
			$this->prenom=$prenom;
		}
		
		function setMail($mail)
		{
			$this->mail=$mail;
		}
		
		function setLogin($login)
		{
			$this->login=$login;
		}
		
		function setPass($pass)
		{
			$this->pass=$pass;
		}
		
		function getNom()
		{
			return $this->nom;
		}
		
		function getPrenom()
		{
			return $this->prenom;
		}
		
		function getMail()
		{
			return $this->mail;
		}
		
		function getLogin()
		{
			return $this->login;
		}
		
		function getPass()
		{
			return $this->pass;
		}
		
		
	}
	/*include ('..\Config\ConfigBDD.php');
	$ad = new admin("MAHMOUDI","Mohamed Amine","medmahmoudi@outlook.com","med","azerty");
	$rs = $ad->add($bdd);*/
	
?>