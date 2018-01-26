<?php
	function addEleve($bdd,$nom,$prenom,$id_classe,$date_nais)
	{
		$res=$bdd->exec("INSERT INTO `eleve` (`id`, `nom`, `prenom`, `id_classe`, `date_nais`, `id_parent`) VALUES (NULL, '$nom', '$prenom', '$id_classe', '$date_nais', '0');");
		$bdd=null;
		return $res;
	}
	
	function updateEleve($bdd,$id_eleve,$id_parent)
	{
		$res=$bdd->exec("UPDATE `eleve` SET `id_parent` = '$id_parent' WHERE `id` = $id_eleve;");
		$bdd=null;
		return $res;
	}
	
	function getListeleve($bdd)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `eleve`");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Classe</th>
                    <th>Parent</th>
                    <th>Action</th>
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
                <td><?php echo $var['date_nais']; ?></td>
                <td><?php 
						$id_c = $var['id_classe'];
						$rsx=$bdd->query("SELECT * FROM `classe` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['niveau']." - ".$vrx['libelle'];
				?></td>
                <td><?php if($var['id_parent'] == 0)
					echo "--";
					else
					{
						$id_p = $var['id_parent'];
						$rs=$bdd->query("SELECT * FROM `parent` WHERE id = ".$id_p);
						$vr = $rs->fetch(PDO::FETCH_ASSOC);
						echo $vr['prenom']." ".$vr['nom'];
					}
				?>
				</td>
				<td><a href="details.php?id=<?php echo $var['id']; ?>" class="btn btn-lg btn-success btn-block">Détails</a></td>
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getListeleveID($bdd,$id)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `eleve` WHERE id_parent = $id");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Classe</th>
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
                <td><?php echo $var['date_nais']; ?></td>
                <td><?php 
						$id_c = $var['id_classe'];
						$rsx=$bdd->query("SELECT * FROM `classe` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['niveau']." - ".$vrx['libelle'];
				?></td>
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getEleveID($bdd,$id)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `eleve` WHERE id = $id");
		$var = $res->fetch(PDO::FETCH_ASSOC);
		$id = $var['id'];
		$nom = $var['nom'];
		$prenom = $var['prenom'];
		$id_parent = $var['id_parent'];
		$date_nais = $var['date_nais'];
		$id_classe = $var['id_classe'];
		?>
		<div class="col-xs-12 col-sm-8">
			<ul class="list-group">
				<li class="list-group-item"> <?php echo $id; ?></li>
				<li class="list-group-item"> <?php echo $nom; ?></li>
				<li class="list-group-item"> <?php echo $prenom; ?></li>
				<li class="list-group-item"> <?php echo $date_nais; ?></li>
				<li class="list-group-item"> <?php echo $id_classe; ?></li>
				<li class="list-group-item"> <?php echo $id_parent; ?></li>
			</ul>
		</div>
		<?php
		$bdd=null;
	}
	
	function getLiens($bdd,$id)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `eleve` WHERE id_parent = $id");
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
		?>
		<a href="index.php?id_eleve=<?php echo $var['id']; ?>" class="list-group-item">&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-user"></i><?php echo $var['nom']." ".$var['prenom']; ?></a>
		<?php
		}
		$bdd=null;
	}
	
	function getListeleveByValue($bdd,$params,$value)
	{
		//$res=$bdd->query("SELECT e.id,e.nom,e.prenom,e.date_nais,e.id_parent,c.libelle,c.niveau FROM `eleve` e, `classe` c,  WHERE e.id_classe = c.id");
		$res=$bdd->query("SELECT * FROM `eleve` WHERE $params LIKE '%$value%'");
		
		?>
		<table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Classe</th>
                    <th>Parent</th>
                    <th>Action</th>
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
                <td><?php echo $var['date_nais']; ?></td>
                <td><?php 
						$id_c = $var['id_classe'];
						$rsx=$bdd->query("SELECT * FROM `classe` WHERE id = ".$id_c);
						$vrx = $rsx->fetch(PDO::FETCH_ASSOC);
						echo $vrx['niveau']." - ".$vrx['libelle'];
				?></td>
                <td><?php if($var['id_parent'] == 0)
					echo "--";
					else
					{
						$id_p = $var['id_parent'];
						$rs=$bdd->query("SELECT * FROM `parent` WHERE id = ".$id_p);
						$vr = $rs->fetch(PDO::FETCH_ASSOC);
						echo $vr['prenom']." ".$vr['nom'];
					}
				?>
				</td>
				<td><a href="details.php?id=<?php echo $var['id']; ?>" class="btn btn-lg btn-success btn-block">Détails</a></td>
            </tr>
							  
			<?php
		}
		?></tbody></table><?php
		$bdd=null;
	}
	
	function getParentE($bdd,$id_p)
	{
		$rs=$bdd->query("SELECT * FROM `eleve` WHERE id = ".$id_p);
		$vr = $rs->fetch(PDO::FETCH_ASSOC);
		$bdd=null;
		return $vr['id_parent'];
	}
	
	function getListClasseParent($bdd)
	{
		$res=$bdd->query("SELECT * FROM `eleve` where id_parent = 0");
		
		?>
		<select name="eleve[]" class="selecter_5" multiple="multiple">
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<option value="<?php echo $var['id']; ?>"><?php echo $var['prenom']."  ".$var['nom']; ?></option>
							  
			<?php
		}
		?></select><?php
		$bdd=null;
	}
	
	function getListEleve1($bdd)
	{
		$res=$bdd->query("SELECT * FROM `eleve`");
		
		?>
		<select name="eleve" class="selecter_5">
		<?php
		while($var = $res->fetch(PDO::FETCH_ASSOC))
		{
			?>
			<option value="<?php echo $var['id']; ?>"><?php echo $var['prenom']."  ".$var['nom']; ?></option>
							  
			<?php
		}
		?></select><?php
		$bdd=null;
	}
?>