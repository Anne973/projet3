<?php
$this->titre = "Mon Blog - Administration"?>

<div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

<h3><i class="fa fa-user" aria-hidden="true"></i>
     Bienvenue <?=$this->nettoyer($login)?>!</h3>
    <a class="btn btn-info pull-right" id="lienDeco" href="connexion/deconnecter";>Se déconnecter</a>
</div>

<div class="col-sm-12">
    <div class="row">
<div class="col-sm-4 thumbnail" style="background-color: grey;padding :10px; ">
    <div class="alert alert-success">
<h4>Dashboard</h4>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?=$this->nettoyer($nbBillets)?></span>
            Nombre de billets
        </li>
        <li class="list-group-item">
            <span class="badge"><?=$this->nettoyer($nbCommentaires)?></span>
            Nombre de commentaires
        </li>
    </ul>
</div>
<div class="alert alert-danger">
    <h4>Commentaires signalés</h4>
    <p>Aucun commentaire signalé pour le moment</p>
</div>
</div>
    <form action="" method="post" class="col-sm-8 thumbnail" style="background-color: grey;  padding:10px;">
    <legend>Saisir un épisode</legend>
        <div class="form-group">
        <label for="titre">Titre de l'épisode :</label>
        <input type="text" id="text" class="form-control">
        </div>
        <div class="form-group">
        <label for="textarea">Texte :</label>
        <textarea name="" id="textarea" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
    </form>
</div>
</div>
