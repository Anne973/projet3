<?php
namespace MonBlog\Framework;
use \MonBlog\Framework\Requete;
use \MonBlog\Framework\Vue;


class Routeur {
    /**
     * @var Requete
     */
    private $requete;

    // Route une requête entrante : exécute l'action associée
    public function routerRequete() {
        try {
            // Fusion des paramètres GET et POST de la requête
            $this->requete= new Requete(array_merge($_GET, $_POST));
            $controleur = $this->creerControleur();
            $action = $this->creerAction();

            $controleur->executerAction($action);
        }
        catch (\Exception $e) {
            $this->gererErreur($e);
        }
    }

    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerControleur()
    {
        $controleur = "Accueil";  // Contrôleur par défaut
        if ($this->requete->existeParametre('controleur')) {
            $controleur = $this->requete->getParametre('controleur');
            // Première lettre en majuscule
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        $classeControleur = "MonBlog\\Controleur\\Controleur" . $controleur;
        try {
            // Instanciation du contrôleur adapté à la requête

            $controleur = new $classeControleur;
            $controleur->setRequete($this->requete);
            return $controleur;
        } catch (\Exception $e) {
            throw new \Exception("Fichier introuvable");
        }
    }
    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction() {
        $action = "index";  // Action par défaut
        if ($this->requete->existeParametre('action')) {
            $action = $this->requete->getParametre('action');
        }
        return $action;
    }

    // Gère une erreur d'exécution (exception)
    private function gererErreur(\Exception $exception) {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()),$this->requete->getSession()->getMessageFlash());
    }
}
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 13/04/2017
 * Time: 11:34
 */