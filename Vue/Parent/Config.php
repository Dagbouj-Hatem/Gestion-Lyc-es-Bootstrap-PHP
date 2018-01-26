<?php
	session_start();
	if(isset($_SESSION['compte']))
	{
		$cpt = $_SESSION['compte'];
		if($cpt == "admin")
		{
			header('location:../admin/index.php');
		}
	}
	else
		header("location:../authentification.php?compte=parent&Erreur=1");
?>