<?php
	//Connexion à Base de données


		$bdd = new PDO('mysql:host=localhost;dbname=ecole;charset=utf8', 'root', '');
	}catch(Exception $exp)
	{
		echo "ERREUR :".$exp->getmessage();
	}
?>