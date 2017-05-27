<?php
namespace MonBlog\Controleur;
use \MonBlog\Controleur\ControleurSecurise;
use \MonBlog\Modele\Billet;
use \MonBlog\Modele\Commentaire;

class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet=new Billet();
        $this->commentaire = new Commentaire();
    }
    public function index()
    {
        $nbBillets=$this->billet->getNombreBillets();
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login=$this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets'=>$nbBillets,'nbCommentaires'=>$nbCommentaires, 'login'=>$login));
    }
}
