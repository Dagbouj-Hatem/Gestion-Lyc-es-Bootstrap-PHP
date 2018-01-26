<?php
	session_start();
	if(isset($_SESSION['compte']))
	{
		$cpt = $_SESSION['compte'];
		if($cpt == "parent")
		{
			header('location:../Parent/index.php');
		}
	}
	else
		header("location:../authentification.php?compte=admin&Erreur=1");
?>