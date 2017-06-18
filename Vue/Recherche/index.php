<?php
if ($nbResultat==NULL){ ?> <div style="padding:20px;"><h2 class="thumbnail"><?=$q;?></h2>
    <p>Aucun résultat n'a été trouvé pour votre recherche</p></div><?php
}
else if ($nbResultat==1){?> <div style="padding:20px;"><h2 class="thumbnail"><?=$q;?></h2>
    <p><?=$nbResultat?> résultat pour votre recherche</p></div><?php
}
else{?> <div style="padding:20px;"><h2 class="thumbnail"><?=$q;?></h2>
<p><?=$nbResultat?> résultats pour votre recherche </p></div><?php
}

foreach ($resultat as $elementResultat){
    ?><div style ="padding-left:20px; padding-right:20px;"><h4><?=$elementResultat['BIL_TITRE'];?></h4>
    <a href="billet/index/<?=$elementResultat['BIL_ID']?>"> Afficher l'épisode</a>

    <hr></div><?php
}
?>
