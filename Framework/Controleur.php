<?php
namespace MonBlog\Framework;
use MonBlog\Framework\Requete;
use MonBlog\Framework\Vue;
abstract class Controleur
{
    private $action;
    protected $requete;

    // définit la requete
    public function setRequete(Requete $requete)
    {
        $this->requete = $requete;
    }

    //execute l'action
    public function executerAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $classeControleur = get_class($this);
            throw new \Exception("Action 'action' non définie dans la classe $classeControleur");
        }
    }


    //méthode abstraite correspondant à l'action par défaut
    public abstract function index();

    //gère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array(),$action=null)
    {
        // Utilisation de l'action actuelle par défaut
        $actionVue = $this->action;
        if ($action != null) {
            // Utilisation de l'action passée en paramètre
            $actionVue = $action;
        }
        //Détermination du nom du fichier vue à partir du nom du controleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("MonBlog\\Controleur\\Controleur", "", $classeControleur);

        //instanciation et génération de la vue
        $vue = new Vue($actionVue, $controleur);
        $vue->generer($donneesVue,$this->requete->getSession()->getMessageFlash());
    }
    //création message flash
    protected function setFlash($message, $type){
        $this->requete->getSession()->setMessageFlash($message, $type);
    }
    //redirige vers un contrôleur et une action
    protected function rediriger($controleur, $action = null)
    {
        $racineWeb = Configuration::get("racineWeb", "/");
        //Redirection vers l'URL racine_site/contrôleur/action
              header("Location:".$racineWeb.$controleur."/".$action);



    }
}
