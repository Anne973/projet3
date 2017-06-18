<?php
namespace MonBlog\Framework;
class Session
{
    //Constructeur
    //Démarre ou restaure la session
    public function __construct()
    {
        session_start();
    }

    //Détruit la session actuelle
    public function detruire()
    {
        session_destroy();
    }


//Ajoute un attribut  à la session
    public function setAttribut($nom, $valeur)
    {
        $_SESSION[$nom] = $valeur;
    }

//Renvoie vrai si l'attribut existe dans la session
    public function existeAttribut($nom)
    {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom] != "");
    }
//Renvoie la valeur de l'attribut demandé
    public function getAttribut($nom)
    {
      if ($this->existeAttribut($nom)) {
          return $_SESSION[$nom];
      }
      else
          {
          throw new \Exception("Attribut '$nom' absent de la session");
      }
    }

//définit un message flash
public function setMessageFlash($message,$type)
{
    $this->setAttribut('flash',array('mess'=>$message, 'type'=>$type));
}

public function getMessageFlash()
{
    if ($this->existeAttribut('flash')){
        $flash=$this->getAttribut('flash');
        $this->setAttribut('flash', "");
    }
    else{
        $flash=false;
    }
    return $flash;
}
}