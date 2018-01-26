<?php
	function addNote($bdd,$id_eleve,$id_matiere,$note)
	{
		$res=$bdd->exec("INSERT INTO `note` (`id`, `id_eleve`, `id_matiere`, `note`) VALUES (NULL, '$id_eleve', '$id_matiere', '$note');");
		$bdd=null;
	}
		
	function getListNote($bdd)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `note` e");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Eleve </th>
                    <th>Matiere </th>
                    <th>Note </th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php $id_c = $var['id_eleve'];
						$rsx=$bdd->query("SELECT * FROM `eleve` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['nom']." ".$vrx['prenom'];; ?></td>
                <td><?php $id_c = $var['id_matiere'];
						$rsx=$bdd->query("SELECT * FROM `matiere` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['nom']; ?></td>
                <td><?php echo $var['note']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getListNoteEleve($bdd,$id_eleve)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `note` WHERE `id_eleve` = $id_eleve");
		$moy = 0;
		$coeff = 0;
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Matiere </th>
                    <th>Note </th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php $id_c = $var['id_matiere'];
						$rsx=$bdd->query("SELECT * FROM `matiere` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['nom'];
						$moy = $moy + ($var['note']*$vrx['coeff']);
						$coeff = $coeff + $vrx['coeff'];
						?></td>
                <td><?php echo $var['note']; ?></td>
                
            </tr>
							  
			<?php
		}
		?><td colspan="2">Moyenne </td><td><?php if ($coeff == 0 ) echo "00.00"; else echo $moy/$coeff; ?></td></tbody></table><?php
		$bdd=null;
	}
	
	function getListNoteByValue($bdd,$params,$value)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `note` WHERE $params LIKE '%$value%'");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Eleve </th>
                    <th>Matiere </th>
                    <th>Note </th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                <td><?php $id_c = $var['id_eleve'];
						$rsx=$bdd->query("SELECT * FROM `eleve` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['nom']." ".$vrx['prenom'];; ?></td>
                <td><?php $id_c = $var['id_matiere'];
						$rsx=$bdd->query("SELECT * FROM `matiere` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['nom']; ?></td>
                <td><?php echo $var['note']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	
?>