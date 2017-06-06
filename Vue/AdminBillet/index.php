<?php
$this->titre = "Mon Blog - Administration"?>

<div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

    <h3><i class="fa fa-user" aria-hidden="true"></i>
        Bienvenue <?=$this->nettoyer($login)?>!</h3>
    <h2>Episode <?=$billet['titre']?></h2>
    <a class="btn btn-info pull-right" id="lienDeco" href="connexion/deconnecter" style="margin-left:10px";><i class="fa fa-unlock" aria-hidden="true"></i>
        Se déconnecter</a>
    <a class="btn btn-info pull-right" href="admin" style="margin-left:10px"><i class="fa fa-chevron-left" aria-hidden="true"></i>
        Retour dashboard</a>
    <a class="btn btn-info pull-right" href="" ><i class="fa fa-home " aria-hidden="true"></i>
        Accueil</a>


</div>

<div class="col-sm-12 ">
    <div class="row">
        <div class="col-sm-4 thumbnail" style="background-color: grey;padding :10px; ">

            <div class="alert alert-success">
                <h4>Commentaires</h4>
                <ul class="list-group">
                    <?php foreach ($comments as $comment) { ?><li class="list-group-item">
                        <p style="overflow-wrap: break-word"><?= $comment['contenu']; ?></p>
                        <p>par <em><?= $comment['auteur']; ?></em> le <?= $comment['date']; ?></p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>


        </div>
        <div class="col-sm-8 thumbnail" style="background-color: grey;  padding:10px;">
        <form action="adminBillet/update" method="post" class="thumbnail">
            <legend>Modifier l'épisode</legend>
            <div class="form-group">
                <label for="titre">Titre de l'épisode :</label>
                <input type="text" id="titre" name="titre" value="<?=$billet['titre']?>" class="form-control">
            </div>
            <div id ="textcontrol" class="form-group">
                <label for="textarea">Texte :</label>
                <textarea name="contenu" id="textarea" rows="10" class="form-control"><?= $billet['contenu']; ?></textarea>
            </div>
            <input type="hidden" name ="id" value="<?=$billet['id']?>">
            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-pencil" aria-hidden="true"></i>
                Modifier</button>

        </form>

        <form action="adminBillet/delete" method="post" class="thumbnail">
            <legend>Supprimer l'épisode</legend>
            <input type="hidden" name ="id" value="<?=$billet['id']?>">
            <button type="submit" class="btn btn-warning btn-lg"><i class="fa fa-trash" aria-hidden="true"></i>
                Supprimer</button>
        </form>
        </div>
    </div>



</div>

