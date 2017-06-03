<?php
$this->titre = "Mon Blog - Administration"?>

<div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

    <h3><i class="fa fa-user" aria-hidden="true"></i>
        Bienvenue <?=$this->nettoyer($login)?>!</h3>
    <h2>Episode <?=$billet['titre']?></h2>
    <div class="btn-group pull-right">
    <a class="btn btn-primary" href="admin">Retour</a>
    <a class="btn btn-info" id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>

    </div>
</div>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4 thumbnail" style="background-color: grey;padding :10px; ">

            <div class="alert alert-danger">
                <h4>Commentaires signalés</h4>
                <p>Aucun commentaire signalé pour le moment</p>
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
            <button type="submit" class="btn btn-success btn-lg">Update</button>

        </form>

        <form action="adminBillet/delete" method="post" class="thumbnail">
            <legend>Supprimer l'épisode</legend>
            <input type="hidden" name ="id" value="<?=$billet['id']?>">
            <button type="submit" class="btn btn-warning btn-lg">Delete</button>
        </form>
        </div>
    </div>



</div>

