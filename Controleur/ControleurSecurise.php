<?php
namespace MonBlog\Controleur;
use \MonBlog\Framework\Controleur;
abstract class ControleurSecurise extends Controleur
{
    public function executerAction($action)
    {
        //vérifie si les informations utilisateur sont présentes et continue l'action ou renvoie vers le controleur de connexion
        if($this->requete->getSession()->existeAttribut('idUtilisateur'))
        {
            parent::executerAction($action);
        }
        else
        {
            $this->rediriger("connexion");
        }
    }
}
