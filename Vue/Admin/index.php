<?php
$this->titre = "Mon Blog - Administration"?>

<div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

<h3><i class="fa fa-user" aria-hidden="true"></i>
     Bienvenue <?=$this->nettoyer($login)?>!</h3>

    <div class="hidden-xs">
        <a class="btn btn-danger pull-right" id="lienDeco" href="connexion/deconnecter";><i class="fa fa-unlock" aria-hidden="true"></i>
            Se déconnecter</a>
    </div>


        <div class="visible-xs">
    <a class="btn btn-danger btn-block" id="lienDeco" href="connexion/deconnecter";><i class="fa fa-unlock" aria-hidden="true"></i>
        Se déconnecter</a>

</div>
</div>

<div class="col-sm-12">
    <div class="row">
<div id="accordeon"class="panel-group col-sm-4 thumbnail" style="background-color: grey;padding :10px;margin-bottom: 1px; ">
<h4>Dashboard</h4>
    <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#item1" data-parent="#accordeon" data-toggle="collapse">
            Billets
                <span class="badge" style="float:right"><?=$this->nettoyer($nbBillets)?></span>
            </a>
        </h3>
    </div>
    <div id="item1" class="panel-collapse collapse">
    <div class="panel-body">
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
    </div>



    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="#item3" data-parent="#accordeon" data-toggle="collapse">
                    Commentaires signalés
                    <span class="badge" style="float:right;"><?=$this->nettoyer($nbCommentairesSignales)?></span>
                </a>
            </h3>
        </div>
        <div id="item3" class="panel-collapse collapse">
            <div class="panel-body">
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
        </div>
    </div>

   <div class="panel panel-success">
       <div class="panel-heading">
           <h3 class="panel-title">
                <a href="adminCommentaire">
                    Tous les Commentaires
                    <span class="badge" style="float:right;" ><?=$this->nettoyer($nbCommentaires)?></span>

                </a>
           </h3>
       </div>
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
           <button class="btn btn-success"><i class="fa fa-share-square-o" aria-hidden="true"></i>
            </i>  Envoyer</button>
        </form>
    </div>
</div>