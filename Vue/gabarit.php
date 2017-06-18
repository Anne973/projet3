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
<div class="visible-xs" style="height:130px;"></div>
<nav class="col-xs-12 navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Billet simple pour l'Alaska</a>
        </div>
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
</nav>


<div class="container">
    <?php if($flash):?>
<div class="messageFlash<?=$flash['type']?>"style="background-color:green; padding:20px; width:100%;"><?=$flash['mess']?></div>
<?php endif;?>


    <div class="row">
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

