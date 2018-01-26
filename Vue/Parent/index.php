<!DOCTYPE html>
<?php
	include_once('Config.php');
	include_once('../../Config/ConfigBDD.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMINISTRATEUR</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="dist/css/site.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="dist/js/site.min.js"></script>
  </head>
  <body>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">CONTROL PARENTALE</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?> <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li class="dropdown-header"><?php echo $_SESSION['login']; ?></li>
                  <li><a href="#">Parametre</a></li>
                  <li class="disabled"><a href="../deconnexion.php">Deconnexion</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>PANNEAU</b></li>
                <li class="list-group-item"><a href="index.php"><i class="glyphicon glyphicon-home"></i>Accueil </a></li>
                <li>  
				  <a href="#demo4" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-briefcase"></i>éléves  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <li class="collapse" id="demo4">
                    <?php
						include('../../controlleur/ControlleurEleve.php');
						getLiens($bdd,$_SESSION['id']);
					?>                    
                    </li>
                </li>
				
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> ACCUEIL</h3>
              </div>
              <div class="panel-body">
                  <div class="content-row">
                    
                  </div>
                  <div class="row">
                    <?php if(isset($_GET['id_eleve']))
					{
						?>
						<div class="panel-body">
					<?php
						include('../../controlleur/ControlleurNote.php');
						include('../../controlleur/ControlleurAbsence.php');
						include('../../controlleur/ControlleurConvocation.php');
						include('../../Modele/eleve.php');
						
					?>
                    <div class="row">
									<div class="col-lg-12">
									
										<div class="col-xs-12 col-sm-4">
										  <ul class="list-group">
											<li class="list-group-item"><b> Identifient :</b> </li>
											<li class="list-group-item"><b> Nom :</b></li>
											<li class="list-group-item"><b> Prénom :</b></li>
											<li class="list-group-item"><b> Date de naissance :</b></li>
											<li class="list-group-item"></i><b> Classe :</b></li>
											<li class="list-group-item"><b> Parent :</b></li>
											
											
										  </ul>
										</div>
										<?php getEleveID($bdd,$_GET['id_eleve']); ?>
									</div>
									
								</div>
								<div class="row">
									<div class="col-lg-12">
										<?php
											if(isset($_POST['sub']))
											{
												addAbsence($bdd,$_POST['id_eleve'],$_POST['date'],$_POST['heure'].":00",$_POST['desg']);
												?>
												<div class="alert alert-info alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<strong>Information !</strong> l'absence est bien ajoutée
												  </div>
												<?php
											}
											else if(isset($_POST['sub2']))
											{
												$id_p = getParentE($bdd,$_POST['id_eleve']);
												addConvocation($bdd,$_POST['id_eleve'],$id_p,$_POST['msg']);
												?>
												<div class="alert alert-info alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<strong>Information !</strong> la convocation est bien envoyer !
												  </div>
												<?php
											}
										?>
									</div>
									<div class="col-lg-6">
										<div class="panel panel-info">
										<div class="panel-heading">
											Note
										</div>
										<div class="panel panel-info">
										  <div class="panel-body">
											<?php getListNoteEleve($bdd,$_GET['id_eleve']); ?>
										  </div>
										</div>
										<div class="panel-heading">
											Convocation du tuteur
										</div>
										  <div class="panel-body">
											<?php getListConvocation($bdd,$_GET['id_eleve']); ?>
										  </div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="panel panel-info">
										<div class="panel-heading">
											Absences
										</div>
										  <div class="panel-body">
											<?php getListAbsence($bdd,$_GET['id_eleve']);?>
										  </div>
										  
										  
										</div>
									</div>
								</div>
                    </div>
						<?php
					}?>
                  </div>
               </div>
            </div><!-- panel body -->
           </div>
        </div><!-- content -->
    </div>
    <!--footer-->
    
  </body>
</html>
