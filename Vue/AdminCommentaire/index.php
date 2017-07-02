<?php
$this->titre = "Mon Blog - Administration"?>

<div class="col-sm-12 thumbnail" style="background-color: grey; padding: 15px; margin-bottom: 1px;">


    <div class="well" style="padding-top:0px; margin-top:20px;">
            <h2>Commentaires</h2>
    </div>
<div class="hidden-xs">

    <a class="btn btn-danger pull-right" id="lienDeco" href="connexion/deconnecter" style="margin-left:10px";><i class="fa fa-unlock" aria-hidden="true"></i>
        Se déconnecter</a>

</div>

    <div class="visible-xs">
        <a class="btn btn-danger btn-block " id="lienDeco" href="connexion/deconnecter"><i class="fa fa-unlock" aria-hidden="true"></i>
            Se déconnecter</a>

    </div>
</div>

<div class="col-sm-12 thumbnail" style="background-color:grey; padding: 15px; margin-bottom: 20px;">
   <?php foreach ($listeComments as $comment){?>
       <h4><i class="fa fa-comments fa-lg" aria-hidden="true"></i>
           <?=$this->nettoyer($comment['auteur']);?> le <em><?=$this->nettoyer($comment['date']);?></em></h4>
       <p><?=$this->nettoyer($comment['contenu']);?></p>
       <a href="adminBillet/index/<?=$comment['bilid'];?>"><button class="btn btn-success btn-sm">Afficher l'épisode</button></a>
       <hr>

       <?php

}
?>
    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $nbPagesCommentaires; $i++): ?>
            <li><a href="adminCommentaire?page=<?= $i ?>"><?= $i ?></a></li>

        <?php endfor; ?>
    </ul>
</div>
