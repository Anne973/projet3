<?php $this->titre = 'Mon blog'; ?>

<section class="col-sm-8" id="contenu">

    <?php


    foreach ($billets as $billet):

        ?>

        <article>
            <header>
                <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
                    <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
                </a>
                <time><?= $this->nettoyer($billet['date']) ?></time>
            </header>
            <p><?= $this->limit_text(($billet['contenu']), 500); ?></p>
            <a class="btn btn-primary btn-sm" href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><span
                        class="glyphicon glyphicon-book"></span> Lire la suite</a>

        </article>
        <hr/>
    <?php endforeach; ?>


    <ul class="pagination">
        <?php
        for ($i = 1; $i <= $nbPages; $i++): ?>
            <li><a href="?page=<?= $i ?>"><?= $i ?></a></li>

        <?php endfor; ?>
    </ul>

</section>

<aside class="col-sm-4">
    <div class="row">

        <div class="col-sm-12" id="bloc_auteur">
            <h3>L'auteur</h3>
            <img src="Contenu/images/writer.png" alt="">
            <h4>Jean Forteroche</h4>
            <p> Acteur et écrivain, je suis passionné depuis toujours par les grandes étendues sauvages de l'Alaska.
                J'en ai fait le cadre de ce roman, que j'espère vous m'aiderez à écrire!
            </p>
        </div>

        <div class="col-sm-12" id="bloc-resume">
            <h3>Résumé</h3>
            <p>Procedente igitur mox tempore cum adventicium nihil inveniretur, relicta ora maritima in Lycaoniam
                adnexam Isauriae se contulerunt ibique densis intersaepientes itinera praetenturis provincialium et
                viatorum opibus pascebantur</p>
        </div>


        <div class="col-sm-8 panel panel-info " id="liste">
            <div class="panel-heading">
                <h3 class="panel-title">Derniers épisodes parus</h3>
            </div>
            <div class="list-group">
                <?php foreach ($liste as $listeElement) { ?><a href="<?= "billet/index/" . $listeElement['id']; ?>"
                                                           class="list-group-item"><span
                            class="glyphicon glyphicon-chevron-right pull-right"></span><?= $listeElement['titre']; ?>
                    </a><?php
                }
                ?>
            </div>
        </div>


    </div>
</aside>

<!-- Element specifique #contenu -->

