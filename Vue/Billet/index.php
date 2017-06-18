<?php
$this->titre = 'Mon blog - ' . $this->nettoyer($billet['titre']); ?>
<article class="col-sm-12">
    <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <header style="padding-top:0px">
            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
            <hr>
        </header>
        <p style="margin-bottom:0px"><?=$billet['contenu']?></p>
    </div>
    </div>
</article>

<div class="col-sm-12">
<div class="row">
    <?php if($nbCommentaires!=0){?>}
<div class="col-sm-8 col-sm-offset-2 well"style="padding-top :0px;" >

        <h3 > Réponses à <?= $billet['titre'] ?></h3>
        <hr>



    <ul  class="media-list" >
        <li class="media">
            <div class="media" style="padding-right:15px;padding-left:15px;">
               <?php include("__commentaires.php") ?>




            </div>
        </li>
    </ul>
</div><?php }?>
</div>
</div>
<div class="col-sm-12">
<div class="row">
    <form class="col-sm-8 col-sm-offset-2 well"  method="post" action="billet/commenter">
        <legend>Commenter cet épisode</legend>
        <div class="form-group">
            <label for="auteur">Votre pseudo :</label>
            <input class="form-control" id="auteur" name="auteur" type="texte" required>
        </div>
        <div class="form-group">
            <label for="commentaire">Votre message :</label>
            <textarea class="form-control" name="contenu"  required></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $billet['id'] ?>">
        <button class="btn btn-primary" type="submit" value="Commenter"><span
                    class="glyphicon glyphicon-ok-sign"></span> Envoyer
        </button>
    </form>
</div>
</div>
