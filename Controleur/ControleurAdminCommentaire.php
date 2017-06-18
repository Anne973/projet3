<?php
namespace MonBlog\Controleur;
use \MonBlog\Controleur\ControleurSecurise;
use \MonBlog\Modele\Billet;
use \MonBlog\Modele\Commentaire;

class ControleurAdminCommentaire extends ControleurSecurise
{

    private $commentaire;

    public function __construct()
    {

        $this->commentaire = new Commentaire();
    }

    //Affiche la liste de tous les commentaires
    public function index()
    {
        $login=$this->requete->getSession()->getAttribut("login");

        $page=$this->requete->getParametre('page',1);
        $nbCommentaires= $this->commentaire->getNombreCommentaires();
        $nbPagesCommentaires = ceil($nbCommentaires/5);
        $listeComments=$this->commentaire->getListeCommentaires($page);
        $this->genererVue(array('listeComments' => $listeComments, 'login'=>$login, 'page' => $page,'nbCommentaires' => $nbCommentaires,'nbPagesCommentaires' => $nbPagesCommentaires));

    }


}
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 12/06/2017
 * Time: 19:22
 */