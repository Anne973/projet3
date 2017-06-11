<?php
namespace MonBlog\Controleur;
use \MonBlog\Framework\Controleur;
use \MonBlog\Modele\Billet;

class ControleurRecherche extends Controleur {

    private $billet;




    public function __construct() {
        $this->billet = new Billet();

    }

    // Affiche la liste de tous les billets du blog
    public function index() {
        $q=$this->requete->getParametre("cle");
        $resultat = $this->billet->searchBillet($q);

        $this->genererVue(array('resultat' => $resultat));

    }
}
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 09/06/2017
 * Time: 18:14
 */