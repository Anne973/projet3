<?php
?><h2> Résultats trouvés</h2><?php


foreach ($resultat as $elementResultat){
    ?><h4><?=$elementResultat['titre'];?></h4>
    <a class="btn btn-primary btn-sm" href=""><span
                class="glyphicon glyphicon-book"></span> Afficher l'épisode</a>

    <hr><?php
}
?>
