<?php
	function addConvocation($bdd,$id_eleve,$id_parent,$message)
	{
		$res=$bdd->exec("INSERT INTO `convocation` VALUES (NULL, '$id_eleve', '$id_parent', '$message', '0');");
		$bdd=null;
	}
		
	function getListConvocation($bdd,$id)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `convocation` WHERE `id_eleve` = $id");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Message </th>
                </tr>
            </thead>
            <tbody>
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<tr>
                <td><?php echo $var['id']; ?></td>
                
                <td><?php echo $var['message']; ?></td>
                
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
?>