<?php
namespace MonBlog\Controleur;
use \MonBlog\Framework\Controleur;
use \MonBlog\Modele\Billet;

class ControleurAccueil extends Controleur {

    private $billet;




    public function __construct() {
        $this->billet = new Billet();

    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $page=$this->requete->getParametre('page',1);
        $nbBillets= $this->billet->getNombreBillets();
        $nbPages = ceil($nbBillets/5);
        $billets = $this->billet->getBillets($page);
        $liste=$this->billet->getListeReduite();
        $this->genererVue(array('billets' => $billets,'page'=>$page, 'nbBillets'=>$nbBillets,
            'nbPages'=>$nbPages, 'liste'=>$liste));

    }
}



