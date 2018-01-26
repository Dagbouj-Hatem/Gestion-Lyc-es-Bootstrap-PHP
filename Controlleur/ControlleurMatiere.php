<?php
	function addMatiere($bdd,$nom,$coeff)
	{
		$res=$bdd->exec("INSERT INTO `matiere` (`id`, `nom`, `coeff`) VALUES (NULL, '$nom', '$coeff');");
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
	
	function getListMatiere($bdd)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `matiere` e");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Coefficient</th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php echo $var['nom']; ?></td>
                <td><?php echo $var['coeff']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getListmatiereByValue($bdd,$params,$value)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `matiere` WHERE $params LIKE '%$value%'");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Coefficient</th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php echo $var['nom']; ?></td>
                <td><?php echo $var['coeff']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	function getListMatiere1($bdd)
	{
		$res=$bdd->query("SELECT * FROM `matiere`");
		
		?>
		<select name="matiere" class="selecter_5">
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<option value="<?php echo $var['id']; ?>"><?php echo $var['nom']; ?></option>
							  
			<?php
		}
		?></select><?php
		$bdd=null;
	}
	
?>