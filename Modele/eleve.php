<?php
	class eleve
	{
		private $nom;
		private $prenom;
		private $id_classe;
		private $date_nais;
		private $id_parent;
		
		function __construct($nom,$prenom,$id_classe,$date_nais,$id_parent)
		{
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->id_classe=$id_classe;
			$this->date_nais=$date_nais;
			$this->id_parent=$id_parent;
		}
		
		function setNom($nom)
		{
			$this->nom=$nom;
		}
		
		function setPrenom($prenom)
		{
			$this->prenom=$prenom;
		}
		
		function setIdClasse($id_classe)
		{
			$this->id_classe=$id_classe;
		}
		
		function setDateNais($date_nais)
		{
			$this->date_nais=$date_nais;
		}
		
		function setIdParent($id_parent)
		{
			$this->id_parent=$id_parent;
		}
		
		function getNom()
		{
			return $this->nom;
		}
		
		function getPrenom()
		{
			return $this->prenom;
		}
		
		function getIdClasse()
		{
			return $this->id_classe;
		}
		
		function getDateNais()
		{
			return $this->date_nais;
		}
		
		function getIdParent()
		{
			return $this->id_parent;
		}
		
		
	}
	
	
?>