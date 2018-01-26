<?php
	function add($bdd)
	{
		$res=$bdd->exec("INSERT INTO `admin` (`id`, `nom`, `prenom`, `mail`, `login`,`pass` ) VALUES (NULL, '$this->nom', '$this->prenom', '$this->mail', '$this->login', MD5('$this->pass'))");
		$bdd=null;
	}
		
	function getAdminByLoginPassAdmin($login,$pass,$bdd)
	{
		$res=$bdd->query("SELECT * FROM `admin` WHERE `login` LIKE '$login' AND `pass` LIKE MD5('$pass')");
		$v = null;
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			$v=$var;
		}
		$bdd=null;
		return $v;
	}
?>