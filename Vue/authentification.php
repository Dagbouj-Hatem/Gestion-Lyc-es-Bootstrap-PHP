<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_GET['compte']))
{
	$cpt = $_GET['compte'];
	if($cpt == "admin")
		$txt = "ADMINISTRATEUR";
	else if($cpt == "parent")
		$txt = "CONTROLE PARENTAL";
	else
		header('location:index.php?erreur=2');
}
else
	header('location:index.php?erreur=1');
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AUTHENTIFICATION</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
			
			<?php
				if(isset($_GET['Erreur']))
				{
					?>
					<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Erreur !</strong> Données incorrectes.
				  </div>
					<?php
				}
			?>
			
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $txt; ?></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="Verifier.php">
						<input type="hidden" name="compte" value="<?php echo $cpt; ?>" />
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" required="true" placeholder="Login" name="login" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="true" placeholder="Mot de passe" name="pass" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">CONNEXION</button>
								<br />
								<button type="reset" class="btn btn-lg btn-danger btn-block">ANNULER</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
