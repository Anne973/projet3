<?php
namespace MonBlog\Controleur;
use \MonBlog\Framework\Controleur;
use \MonBlog\Modele\Utilisateur;


class ControleurConnexion extends Controleur
{
    private $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function index()
    {
        $this->genererVue();
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->utilisateur->connecter($login, $mdp)) {
                $utilisateur = $this->utilisateur->getUtilisateur($login);
                $this->requete->getSession()->setAttribut("idUtilisateur", $utilisateur['idUtilisateur']);
                $this->requete->getSession()->setAttribut("login", $utilisateur['login']);
                $this->rediriger("admin");

            }
            else {
                $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'), "index");
            }

       }
       else{
                throw new \Exception("Action impossible : login ou mot de passe non défini");
       }
    }



    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("accueil");
        //header('location: /MonBlog/accueil/');
    }
}

/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 30/04/2017
 * Time: 20:05
 */