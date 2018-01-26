<?php
	function addClasse($bdd,$nom,$niveau)
	{
		$res=$bdd->exec("INSERT INTO `classe` (`id`, `libelle`, `niveau`) VALUES (NULL, '$nom', '$niveau');");
		$bdd=null;
	}
		
	function getListClasseSelecter($bdd)
	{
		$res=$bdd->query("SELECT * FROM `classe`");
		
		?>
		<select name="classe" class="form-control">
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<option value="<?php echo $var['id']; ?>"><?php echo $var['niveau']." - ".$var['libelle']; ?></option>
							  
			<?php
		}
		?></select><?php
		$bdd=null;
	}
	
	function getListClasse($bdd)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `classe` e");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Libelle</th>
                    <th>Niveau</th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php echo $var['libelle']; ?></td>
                <td><?php echo $var['niveau']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getListClasseByValue($bdd,$params,$value)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `classe` WHERE $params LIKE '%$value%'");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Libelle</th>
                    <th>Niveau</th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php echo $var['libelle']; ?></td>
                <td><?php echo $var['niveau']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
?>