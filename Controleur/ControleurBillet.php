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
        $nbCommentaires=$this->commentaire->getNbCommentaires($idBillet);
        $this->genererVue(array('billet' => $billet,
            'commentaires' => $commentaires, 'modeleCom'=>$this->commentaire, 'nbCommentaires'=> $nbCommentaires));
    }

    // Ajoute un commentaire sur un billet
    public function commenter() {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");

        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        $this->setFlash("votre commentaire a été ajouté","success");
        // Exécution de l'action par défaut pour actualiser la liste des billets
        $this->rediriger("billet", "index/" . $idBillet);


    }

    public function signaler()
    {
        $idCommentaire = $this->requete->getParametre("id");
        $com = $this->commentaire->getCommentaire($idCommentaire);
        $this->commentaire->signalerCommentaire($idCommentaire);
        $this->setFlash("ce commentaire a été signalé au modérateur","success");
        $this->rediriger("billet", "index/" . $com['bilid']);
    }

    public function repondre()
        {
            $idCommentaire = $this->requete->getParametre("id");
            $com = $this->commentaire->getCommentaire($idCommentaire);

            $auteur = $this->requete->getParametre("auteur");
            $contenu = $this->requete->getParametre("contenu");
            $idBillet = $com['bilid'];
            $depth = $com['depth'] + 1;
            $parentid = $idCommentaire;

            if ($depth<=3){
            $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet, $depth, $parentid);
            $this->setFlash("votre réponse a été ajoutée","success");
            $this->rediriger("billet", "index/" . $com['bilid']);
            }
            else{
                throw new \Exception("il ne peut y avoir plus de trois sous-niveaux de commentaires");
            }
        }
    }

