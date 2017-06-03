<?php
$this->titre = 'Mon blog - ' . $this->nettoyer($billet['titre']); ?>
<article class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <header>
            <h1 id="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>

        <p><?= $this->nettoyer($billet['contenu']) ?></p>
    </div>
</article>


<div class="row">
<div class="col-sm-8 col-sm-offset-2 thumbnail" style="background-color: #e8daac">
    <header style="margin-top :0px; padding-left:10px;">
        <h2> Réponses à <?= $billet['titre'] ?></h2>
        <hr style="color:black">

    </header>

    <ul class="media-list" style="padding-left :10px;">
        <li class="media-thumbnail">
            <div class="media-body">
                <?php include("__commentaires.php") ?>

                <script>
                    $(function () {
                        $("form.form-reply").submit(function (e) {
                            e.preventDefault();
                            var $form = $(this);
                            $.post($form.attr("action"), $form.serialize())
                                .done(function (data) {
                                    $("#html").html(data);
                                    $("#formulaire").modal("hide");
                                })
                                .fail(function () {
                                    alert("erreur");
                                });
                        });
                    });
                </script>


            </div>
        </li>
    </ul>
</div>
</div>

<div class="row">
    <form class="col-sm-8 col-sm-offset-2 well" method="post" action="billet/commenter">
        <legend>Commenter cet épisode</legend>
        <div class="form-group">
            <label for="auteur">Votre pseudo :</label>
            <input class="form-control" id="auteur" name="auteur" type="texte" required>
        </div>
        <div class="form-group">
            <label for="commentaire">Votre message :</label>
            <textarea class="form-control" name="contenu" required></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $billet['id'] ?>">
        <button class="btn btn-primary" type="submit" value="Commenter"><span
                    class="glyphicon glyphicon-ok-sign"></span> Envoyer
        </button>
    </form>
</div>
