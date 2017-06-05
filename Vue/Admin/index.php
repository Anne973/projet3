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
        <li class="list-group-item">
            <span class="badge"><?=$this->nettoyer($nbCommentairesSignales)?></span>
            Nombre de commentaires signalés
        </li>
    </ul>
</div>
    <div class="alert alert-info">

        <h4>Liste des commentaires</h4>

        <ul class="list-group">
            <?php foreach ($listecomments as $elementcomment) { ?><li class="list-group-item">
                <p>Le <?=$elementcomment['date'];?></p> <p style="overflow-wrap: break-word"><?= $elementcomment['contenu'];?> par <em><?=$elementcomment['auteur']?></em>


                </li>
                <?php
            }
            ?>
        </ul>
    </div>

<div class="alert alert-danger">
    <h4>Commentaires signalés</h4>
    <ul class="list-group">
        <?php foreach ($commentairesSignales as $commentaireSignale) { ?><li class="list-group-item">
            <p style="overflow-wrap: break-word"><?= $commentaireSignale['contenu']; ?></p> <p>par <em><?= $commentaireSignale['auteur']; ?></em> le <?= $commentaireSignale['date']; ?></p>

            <form action="admin/validerCommentaire" method="post"style="display:inline;"><button type="submit" class="btn btn-success btn-xs">OK</button>
                <input type="hidden" name="id" value="<?= $commentaireSignale['id']; ?>">
            </form>

            <form action="admin/supprimerCommentaire" method="post" style="display:inline;"><button type="submit" class="btn btn-warning btn-xs" >Supprimer</button>
                <input type="hidden" name="id" value="<?= $commentaireSignale['id']; ?>">
            </form>
            </li>
            <?php
        }
        ?>
    </ul>
</div>


    <div class="alert alert-info">

            <h4>Liste des épisodes</h4>

        <ul class="list-group">
            <?php foreach ($tousBillets as $elementBillet) { ?><li class="list-group-item">
                <?= $elementBillet['titre']; ?> <a href="<?= "adminBillet/index/" . $elementBillet['id']; ?>" ><button class="btn btn-primary btn-xs pull-right">Afficher</button>

                </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>


</div>
    <form action="admin/inserer" method="post" class="col-sm-8 thumbnail" style="background-color: grey;  padding:10px;">
    <legend>Saisir un épisode</legend>
        <div class="form-group">
        <label for="titre">Titre de l'épisode :</label>
        <input type="text" id="titre" name="titre" class="form-control">
        </div>
        <div id ="textcontrol" class="form-group">
        <label for="textarea">Texte :</label>
        <textarea name="contenu" id="textarea" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
    </form>
</div>



</div>
