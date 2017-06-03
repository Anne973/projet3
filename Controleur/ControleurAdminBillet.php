<?php
namespace MonBlog\Controleur;
use \MonBlog\Controleur\ControleurSecurise;
use \MonBlog\Modele\Billet;
use \MonBlog\Modele\Commentaire;

class ControleurAdminBillet extends ControleurSecurise
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

        $idBillet = $this->requete->getParametre("id");

        $billet = $this->billet->getBillet($idBillet);
        $login=$this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('billet' => $billet, 'login'=>$login));

    }

    //Modifie un billet
        public function update()
        {
            $idBillet = $this->requete->getParametre("id");
            $titre = $this->requete->getParametre("titre");
            $contenu = $this->requete->getParametre("contenu");

            $this->billet->updateBillet($titre, $contenu, $idBillet);

            // Exécution de l'action par défaut pour réactualiser la page
            $this->executerAction("index");
        }

    //Supprime un billet
        public function delete()
        {
            $idBillet = $this->requete->getParametre("id");
            $this->billet->deleteBillet($idBillet);
            $this->rediriger(admin);


        }


}

