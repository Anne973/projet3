<?php foreach ($commentaires as $commentaire): ?>
    <div class="thumbnail" style="background-color: #b3ad99;">
        <h4 class="media-heading" style="margin-top:10px; margin-left :10px;"><?= $commentaire['auteur'] ?></h4>
        <p style="margin-top:10px; margin-left:10px; overflow-wrap: break-word"><?= $commentaire['contenu'] ?></p>
    </div>

    <div>
        <button data-toggle="modal" data-backdrop="false" href="#formulaire" class="btn btn-success btn-xs">Répondre
        </button>
        <form action="billet/signaler" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $commentaire['id'] ?>">
            <button type="submit" class="btn btn-warning btn-xs">Signaler</button>
        </form>
    </div>
    <div class="modal fade" id="formulaire">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Votre réponse</h4>
                </div>
                <div class="modal-body">
                    <form class="form-reply" action="billet/repondre" method="post">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="auteur" id="auteur">
                        </div>
                        <div class="form-group">
                            <label for="commentaire">Message</label>
                            <textarea class="form-control" name="contenu" id="contenu"></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?= $commentaire['id'] ?>">
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-left :40px; margin-top :20px;">
        <?php $commentaires = $modeleCom->getCommentairesEnfants($commentaire['id']);
        include('__commentaires.php');
        ?>

    </div>
<?php endforeach; ?>
