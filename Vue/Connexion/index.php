<?php
$this->titre ="MonBlog - Connexion"?>
<div class="row">
    <p class="text-center" style="margin-top:20px; margin-bottom :20px;"><i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
        <strong> Vous devez être connecté pour accéder à cette zone.</strong>
    </p>
</div>

<div class="row">

<form class = "col-sm-4 col-sm-offset-4" action="connexion/connecter" method="post">
    <div class="form-group">
    <input name="login" type="text" placeholder ="Entrez votre login" required autofocus class="form-control input-lg">
    </div>
    <div class="form-group">
    <input name="mdp" type="password" placeholder ="Entrez votre mot de passe" required class="form-control input-lg" >
    </div>
 <button type="submit" class="btn btn-primary btn-lg btn-block">Connexion</button>
</form>
<?php if (isset($msgErreur)):?>
<p><?=$msgErreur?></p>
<?php endif;?>
</div>
