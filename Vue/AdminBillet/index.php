<?php
$this->titre = "Mon Blog - Administration"?>

<div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">

    <div class="well" style="padding-top:0px; margin-top:20px;">
        <h2>Episode <?=$billet['titre']?></h2>
    </div>
    <div class="hidden-xs"><a class="btn btn-danger pull-right" id="lienDeco" href="connexion/deconnecter" style="margin-left:10px";><i class="fa fa-unlock" aria-hidden="true"></i>
        Se déconnecter</a>
    </div>
    <div class="visible-xs">
              <div><a class="btn btn-danger btn-block" id="lienDeco" href="connexion/deconnecter" style="margin-top:10px;"><i class="fa fa-unlock" aria-hidden="true"></i>
            Se déconnecter</a></div>
    </div>


</div>

<div class="col-sm-12 ">
    <div class="row">
        <div class=" col-sm-4 thumbnail" style="background-color: grey;padding :10px;margin-bottom:2px;">
            <div class="panel panel-success" style="margin-bottom:5px; margin-top:5px;">
              <div class="panel-heading">
                  <h4 class="panel-title"><a data-toggle="collapse"  href="#menu"><span class="badge" style="float:right"><?=$this->nettoyer($nbCommentaires)?></span>Commentaires</h4></a>
              </div>

<?php if($nbCommentaires!=0){?>
    <div id="menu" class="panel-collapse collapse">

                <ul class="list-group ">
                    <?php foreach ($comments as $comment) { ?><li class="list-group-item">
                        <p style="overflow-wrap: break-word"><?= $this->nettoyer($comment['contenu']); ?></p>
                        <p>par <em><?= $this->nettoyer($comment['auteur']); ?></em> le <?= $this->nettoyer($comment['date']); ?></p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div><?php }?>
            </div>
        </div>
        <div class="col-sm-8 thumbnail" style="background-color: grey;  padding:10px;">
        <form action="adminBillet/update" method="post" class="thumbnail" style="margin-top :5px;">
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
            <button type="submit" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                Modifier</button>

        </form>

        <form action="adminBillet/delete" method="post" class="thumbnail" style="margin-bottom:5px";>
            <legend>Supprimer l'épisode</legend>
            <input type="hidden" name ="id" value="<?=$billet['id']?>">
            <button type="submit" class="btn btn-warning"><i class="fa fa-trash" aria-hidden="true"></i>
                Supprimer</button>
        </form>
        </div>
    </div>



</div>

