<?php
$this->titre = "Mon Blog - Administration"?>
<h2>Administration</h2>
Bienvenue <?=$this->nettoyer($login)?>!
Ce Blog comporte <?=$this->nettoyer($nbBillets)?> billets et <?=$this->nettoyer($nbCommentaires)?> commentaires.
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
