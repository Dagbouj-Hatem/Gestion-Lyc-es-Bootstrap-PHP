<?php
	function addParent($bdd,$nom,$prenom,$mail,$login,$pass,$tel)
	{
		$res=$bdd->exec("INSERT INTO `parent` (`id`, `nom`, `prenom`, `mail`, `login`,`pass`,`tel` ) VALUES (NULL, '$nom', '$prenom', '$mail', '$login', MD5('$pass'), $tel)");
		$last_id = $bdd->lastInsertId();
		$bdd=null;
		return $last_id;
	}
		
	function getAdminByLoginPassParent($login,$pass,$bdd)
	{
		$res=$bdd->query("SELECT * FROM `parent` WHERE `login` LIKE '$login' AND `pass` LIKE MD5('$pass')");
		$v = null;
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			$v=$var;
		}
		$bdd=null;
		return $v;
	}
	
	function getListparent($bdd)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `parent` e");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>élèves</th>
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
                <td><?php echo $var['prenom']; ?></td>
                <td><?php echo $var['mail']; ?></td>
                <td><?php echo $var['tel']; ?></td>
                <td><?php getListeleveID($bdd,$var['id']); ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getListparentByValue($bdd,$params,$value)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `parent` WHERE $params LIKE '%$value%'");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>élèves</th>
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
                <td><?php echo $var['prenom']; ?></td>
                <td><?php echo $var['mail']; ?></td>
                <td><?php echo $var['tel']; ?></td>
                <td><?php getListeleveID($bdd,$var['id']); ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
?>