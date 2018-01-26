<?php
	class _parent
	{
		private $nom;
		private $prenom;
		private $mail;
		private $login;
		private $pass;
		private $type; 
		private $tel; 
		
		function __construct($nom,$prenom,$mail,$login,$pass,$tel)
		{
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->mail=$mail;
			$this->login=$login;
			$this->pass=$pass;
			$this->tel=$tel;
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
		
		function setTel($tel)
		{
			$this->tel=$tel;
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
		
		function getTel()
		{
			return $this->tel;
		}
		
	}
	/*include ('..\Config\ConfigBDD.php');
	$ad = new admin("MAHMOUDI","Mohamed Amine","medmahmoudi@outlook.com","med","azerty");
	$rs = $ad->add($bdd);*/
	
?>