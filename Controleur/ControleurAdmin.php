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
        $nbCommentairesSignales =$this->commentaire->getNombreCommentairesSignales();
        $login=$this->requete->getSession()->getAttribut("login");
        $tousBillets=$this->billet->getListeExhaustive();

        $commentairesSignales=$this->commentaire->getCommentairesSignales();
        $this->genererVue(array('nbBillets'=>$nbBillets,'nbCommentaires'=>$nbCommentaires,'nbCommentairesSignales'=>$nbCommentairesSignales, 'login'=>$login, 'tousBillets'=>$tousBillets, 'commentairesSignales'=>$commentairesSignales));
    }

    // Insère un nouveau billet
    public function inserer() {

        $titre = $this->requete->getParametre("titre");
        $contenu = $this->requete->getParametre("contenu");

        $this->billet->ajouterBillet($titre, $contenu);
        $this->setFlash("Votre épisode a bien été ajouté","success");
        // Exécution de l'action par défaut pour réactualiser la page
        $this->rediriger("admin");
    }

    public function supprimerCommentaire(){
        $idCommentaire=$this->requete->getParametre("id");
        $this->commentaire->deleteCommentaire($idCommentaire);
        $this->setFlash("commentaire supprimé","success");
        $this->rediriger(admin);
    }

    public function validerCommentaire(){
        $idCommentaire=$this->requete->getParametre("id");
        $this->commentaire->validateCommentaire($idCommentaire);
        $this->setFlash("commentaire validé","success");
        $this->rediriger(admin);
    }
}
