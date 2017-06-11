<?php
namespace MonBlog\Modele;
use MonBlog\Framework\Modele;



class Utilisateur extends Modele
{
    //vérifie qu'un utilisateur existe dans la BD
    public function connecter($login, $mdp)
    {
        $sql = "select UTIL_ID, UTIL_MDP from T_UTILISATEUR where UTIL_LOGIN=? ";

        $utilisateur =$this->executerRequete($sql,array($login))->fetch();
        if ($utilisateur){
            return password_verify($mdp, $utilisateur['UTIL_MDP']);
        }
        else{
            return false;
        }

    }

    //renvoie un utilisateur existant dans la BD
    public function getUtilisateur($login)
    {
        $sql="select UTIL_ID as idUtilisateur, UTIL_LOGIN as login from T_UTILISATEUR where UTIL_LOGIN=? ";
        $utilisateur=$this->executerRequete($sql, array($login));
        if ($utilisateur->rowCount()==1){
            return $utilisateur->fetch();
        }
        else
        {
            throw new \Exception("Aucun utilisateur ne correspond aux identifiants fournis");
        }
    }

}