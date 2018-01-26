<?php
	function addAbsence($bdd,$id_eleve,$date,$heure,$desg)
	{
		$res=$bdd->exec("INSERT INTO `absence` (`id`, `id_eleve`, `date_abs`, `heure_abs`, `designation`) VALUES (NULL, '$id_eleve', '$date', '$heure', '$desg');");
		$bdd=null;
	}
		
	function getListAbsence($bdd,$id)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `absence` WHERE `id_eleve` = $id");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Eleve </th>
                    <th>Date </th>
                    <th>Heure </th>
                    <th>Désignation </th>
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
                <td><?php echo $var['date_abs']; ?></td>
                <td><?php echo $var['heure_abs']; ?></td>
                <td><?php echo $var['designation']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
?>