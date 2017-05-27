<?php
namespace MonBlog\Framework;
use MonBlog\Framework\Session;
class Requete{
  //parametres de la requete
    private $parametres;
    //objet session associé à la requête
    private $session;

    public function __construct($parametres){
        $this->parametres=$parametres;
        $this->session=new Session();
    }

    //Renvoie vrai si le parametre existe dans la requete
    public function existeParametre($nom){
        return (isset($this->parametres[$nom])&& $this->parametres[$nom]!="");
    }

    //Renvoie la valeur du paramètre demandé
    //Lève une exception si le paramètre est introuvable
public function getParametre($nom,$default='undefined'){
        if($this->existeParametre($nom)){
return $this->parametres[$nom];
        }
        elseif($default!='undefined'){
            return $default;
        }
        else{
            throw new \Exception("Paramètre '$nom' absent de la requête");
        }
    }
    //renvoie l'objet session associé à la requête
    public function getSession(){
    return $this->session;
    }
}
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 18/04/2017
 * Time: 11:51
 */