<?php
namespace MonBlog\Modele;
use \MonBlog\Framework\Modele;

class Billet extends Modele
{

    // Renvoie la liste des billets du blog

    public function getListe()
    {

        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc limit 0,10';
        $liste = $this->executerRequete($sql);

        return $liste;

    }
   public function getBillets($page)
    {

        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc limit '.(($page-1)*5).', 5';

       $billets=$this->executerRequete($sql);
        return $billets->fetchAll();
    }

    // Renvoie les informations sur un billet
    public function getBillet($idBillet)
    {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() == 1)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    //renvoie le nombre de billets
    public function getNombreBillets()
    {
        $sql = 'SELECT COUNT(*)AS nbBillets FROM T_BILLET';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();
        return $ligne['nbBillets'];

    }

}


/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 12/04/2017
 * Time: 10:38
 */