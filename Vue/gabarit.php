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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'#textarea' });</script>

    <title><?= $titre ?></title><!-- Element specifique -->

</head>
<body>

<div class="container">
    <header class="row">

        <a href="index.php"><h1 class="text-center" id="titreBlog">Billet simple pour l'Alaska</h1></a>
        <h3 class="text-center" id="soustitre">Roman en ligne</h3>

    </header>

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

