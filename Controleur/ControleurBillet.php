<?php
namespace MonBlog\Controleur;
use \MonBlog\Framework\Controleur;
use \MonBlog\Modele\Billet;
use \MonBlog\Modele\Commentaire;

class ControleurBillet extends Controleur {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function index() {
        $idBillet = $this->requete->getParametre("id");

        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentairesParents($idBillet);

        $this->genererVue(array('billet' => $billet,
            'commentaires' => $commentaires, 'modeleCom'=>$this->commentaire));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");

        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);

        // Exécution de l'action par défaut pour actualiser la liste des billets
        $this->executerAction("index");
    }

    public function signaler()
    {
        $idCommentaire = $this->requete->getParametre("id");
        $com = $this->commentaire->getCommentaire($idCommentaire);
        $this->commentaire->signalerCommentaire($idCommentaire);
        $this->rediriger("billet", "index/" . $com['bilid']);
    }

    public function repondre()
        {
            $idCommentaire = $this->requete->getParametre("id");
            $comment = $this->commentaire->getCommentaire($idCommentaire);

            $auteur = $this->requete->getParametre("auteur");
            $contenu = $this->requete->getParametre("contenu");
            $idBillet = $comment['bilid'];
            $depth = $comment['depth'] + 1;
            $parentid = $idCommentaire;
            $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet, $depth, $parentid);

        }
    }

