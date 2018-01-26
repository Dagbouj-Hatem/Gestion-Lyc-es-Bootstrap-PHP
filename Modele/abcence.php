<?php
	class admin
	{
		private $id_eleve;
		private $date_abs;
		private $heure_abs;
		private $designation;
		
		function __construct($id_eleve,$date_abs,$heure_abs,$designation)
		{
			$this->id_eleve=$id_eleve;
			$this->date_abs=$date_abs;
			$this->heure_abs=$heure_abs;
			$this->designation=$designation;
		}
		
		
		
	}
	
?>