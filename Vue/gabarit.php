<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= $racineWeb ?>">

    <link href="Contenu/css/bootstrap.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="Contenu/css/style.css" rel="stylesheet" >
    <script src="Contenu/js/jquery.js"></script>
    <script src="Contenu/js/bootstrap.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qq15uyx3s076tus4hc5xw0xtxurq31zffmmha0ddfkujiwjj"></script>
    <script>tinymce.init({ selector:'#textarea' });</script>

    <title><?= $titre ?></title><!-- Element specifique -->

</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Billet simple pour l'Alaska</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <p class="navbar-text hidden-xs"><em>Roman en ligne</em></p>
        <ul class="nav navbar-nav">
        <li class="active"><a href="">Accueil</a></li>
        <li><a href="admin">Admin</a></li>
        </ul>
        <form class="navbar-form navbar-right inline-form " action ="recherche/index" method="post">
            <div class="form-group">
                <input type="search" minlength="4" class="input-sm form-control" id="cle" name="cle"  placeholder="Recherche">
                <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
            </div>
        </form>
        </div>
    </div>
</nav>



<div class="container"  >


    <div class="row">
        <?php if($flash):?>
            <?php if($flash['type']=="success"):?>
            <div class="alert alert-success" style="margin-bottom:0px;"><i class="fa fa-check fa-lg" aria-hidden="true"></i> <?=$flash['mess']?></div>
            <?php endif;?>
            <?php if($flash['type']=="warning"):?>
                <div class="alert alert-danger" style="margin-bottom:0px;"><i class="fa fa-exclamation fa-lg" aria-hidden="true"></i> <?=$flash['mess']?></div>
            <?php endif;?>
        <?php endif;?>


        <?= $contenu ?>


    </div>
    <footer class="row text-center" id="piedBlog">
        <a class="btn btn-primary" href="#"><i class="fa fa-twitter fa-2x"></i></a>
        <a class="btn btn-primary" href="#"><i class="fa fa-facebook fa-2x"></i></a>
        <a class="btn btn-primary" href="#"><i class="fa fa-google-plus fa-2x"></i></a>

    </footer>
</div> <!-- .container -->
</body>
</html>

