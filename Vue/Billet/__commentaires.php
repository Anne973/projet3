<?php foreach($commentaires as $commentaire): ?>
    <h4 class="media-heading"><?=$commentaire['auteur']?></h4>
    <p><?=$commentaire['contenu']?></p>

    <div id="html">
        <button data-toggle="modal" data-backdrop="false" href="#formulaire" class="btn btn-success btn-xs">Répondre</button>
        <button class="btn btn-warning btn-xs">Signaler</button></div>
    <div class="modal fade" id="formulaire">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Votre réponse</h4>
                </div>
                <div class="modal-body">
                    <form action="test.php">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom">
                        </div>
                        <div class="form-group">
                            <label for="commentaire">Message</label>
                            <textarea class="form-control" name="commentaire" id="commentaire"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-left: 20px;">
    <?php $commentaires=$modeleCom->getCommentairesEnfants($commentaire['id']);
    include('__commentaires.php');
    ?>
    </div>
<?php endforeach; ?>
