<?php
namespace MonBlog\Modele;
use MonBlog\Framework\Modele;



class Utilisateur extends Modele
{
    //vérifie qu'un utilisateur existe dans la BD
    public function connecter($login, $mdp)
    {
        $sql = "select UTIL_ID from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $utilisateur =$this->executerRequete($sql,array($login,$mdp));
        return($utilisateur->rowCount()==1);
    }

    //renvoie un utilisateur existant dans la BD
    public function getUtilisateur($login, $mdp)
    {
        $sql="select UTIL_ID as idUtilisateur, UTIL_LOGIN as login, UTIL_MDP as mdp from T_UTILISATEUR where UTIL_LOGIN=? and UTIL_MDP=?";
        $utilisateur=$this->executerRequete($sql, array($login,$mdp));
        if ($utilisateur->rowCount()==1){
            return $utilisateur->fetch();
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond aux identifiants fournis");
        }
    }

}