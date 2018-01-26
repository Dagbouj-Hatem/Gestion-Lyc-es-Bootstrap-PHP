<?php
	class note
	{
		private $id_eleve;
		private $id_matiere;
		private $note;
		
		function __construct($id_eleve,$id_matiere,$note)
		{
			$this->id_eleve=$id_eleve;
			$this->id_matiere=$id_matiere;
			$this->note=$note;
		}
		
		function setIdEleve($id_eleve)
		{
			$this->id_eleve=$id_eleve;
		}
		
		function setIdMatiere($id_matiere)
		{
			$this->id_matiere=$id_matiere;
		}
		
		function setNote($note)
		{
			$this->note=$note;
		}
		
		
		function getIdEleve()
		{
			return $this->id_eleve;
		}
		
		function getIdMatiere()
		{
			return $this->id_matiere;
		}
		
		function getNote()
		{
			return $this->note;
		}
		
	}
	
	
?>