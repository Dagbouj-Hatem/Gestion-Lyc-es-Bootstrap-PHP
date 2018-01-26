<?php
	if(isset($_POST['compte']))
	{
		include_once("../Config/ConfigBDD.php");
		
		$cpt = $_POST['compte'];
		if($cpt == "admin")
		{	
			$txt = "admin";
			include_once("../Controlleur/ControlleurAdmin.php");
			
			$res = getAdminByLoginPassAdmin(addslashes($_POST['login']),addslashes($_POST['pass']),$bdd);
			if($res == null)
				header('location:authentification.php?compte=admin&Erreur=1');
			else
			{
				session_start();
				$_SESSION['id']=$res['id']; //identifient de l'administrateur
				$_SESSION['login']=$res['login'];
				$_SESSION['nom']=$res['nom'];
				$_SESSION['prenom']=$res['prenom'];
				$_SESSION['compte']=$txt; // type de compte
				header('location:Admin/');
			}
			
		}
		else if($cpt == "parent")
		{
			$txt = "parent";
			include_once("../Controlleur/ControlleurParent.php");
			
			$res = getAdminByLoginPassParent(addslashes($_POST['login']),addslashes($_POST['pass']),$bdd);
			if($res == null)
				header('location:authentification.php?compte=parent&Erreur=1');
			else
			{
				session_start();
				$_SESSION['id']=$res['id']; //identifient Parental
				$_SESSION['login']=$res['login'];
				$_SESSION['nom']=$res['nom'];
				$_SESSION['prenom']=$res['prenom'];
				$_SESSION['compte']=$txt; // type de compte
				header('location:Parent/');
			}
		}
		else
			header('location:index.php?erreur=2');
				
	}
	else
	{
		header('location:index.php');
	}
?>