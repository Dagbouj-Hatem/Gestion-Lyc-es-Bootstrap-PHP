<?php
	class matiere
	{
		private $nom;
		private $coeff;
		
		
		function __construct($nom,$coeff)
		{
			$this->nom=$nom;
			$this->coeff=$coeff;
		}
		
		function setNom($nom)
		{
			$this->nom=$nom;
		}
		
		function setCoeff($Coeff)
		{
			$this->coeff=$coeff;
		}
		
		
		
		function getNom()
		{
			return $this->nom;
		}
		
		function getCoeff()
		{
			return $this->coeff;
		}
		
		
		
	}
	
?>