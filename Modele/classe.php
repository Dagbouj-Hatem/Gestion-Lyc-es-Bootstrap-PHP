<?php
	class classe
	{
		private $libelle;
		private $niveau;
		
		function __construct($libelle,$niveau)
		{
			$this->libelle=$libelle;
			$this->niveau=$niveau;
		}
		
		function setLibelle($libelle)
		{
			$this->libelle=$libelle;
		}
		
		function setNiveau($niveau)
		{
			$this->niveau=$niveau;
		}
		
		function getLibelle()
		{
			return $this->libelle;
		}
		
		function getNiveau()
		{
			return $this->niveau;
		}
		
	}
	
?>