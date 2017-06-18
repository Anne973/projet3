<?php
namespace MonBlog\Modele;
use \MonBlog\Framework\Modele;

class Billet extends Modele
{
    //Renvoie la liste exhaustive des billets
    public function getListeExhaustive()
    {

        $sql = 'select BIL_ID as id, BIL_DATE as date,'
            . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
            . ' order by BIL_ID desc';
        $tousBillets = $this->executerRequete($sql);

        return $tousBillets;

    }

    //Renvoie la liste des 10 derniers billets du blog

    public function getListeReduite()
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
            . ' order by BIL_ID desc limit ' . (($page - 1) * 5) . ', 5';

        $billets = $this->executerRequete($sql);
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

    //Ajoute des billets dans la base
    public function ajouterBillet($titre, $contenu)
    {
        $sql = 'INSERT INTO T_BILLET (BIL_DATE, BIL_TITRE, BIL_CONTENU) VALUES (NOW(), ?, ?)';

        $this->executerRequete($sql, array($titre, $contenu));
    }

    //Modifie des billets dans la base
    public function updateBillet($titre, $contenu, $idBillet)
    {
        $sql = 'UPDATE T_BILLET SET BIL_DATE=NOW(), BIL_TITRE=?, BIL_CONTENU=? WHERE BIL_ID=?';
        $this->executerRequete($sql, array($titre, $contenu, $idBillet));
    }

    //Supprime les billets dans la base
    public function deleteBillet($idBillet)
    {
        $sql = 'DELETE FROM T_BILLET WHERE BIL_ID=?';
        $this->executerRequete($sql, array($idBillet));
    }

    //Recherche par mot clé
    public function searchBillet($q)
    {
        if (strlen($q) > 3) {
            $s = explode(" ", $q);
            $sql = "SELECT * FROM T_BILLET";
            $i = 0;
            foreach ($s as $mot) {
                if (strlen($mot) > 3) {
                    if ($i == 0) {
                        $sql .= " WHERE ";
                    } else {
                        $sql .= " AND ";
                    }
                    $sql .= "BIL_CONTENU LIKE '%$mot%'";
                    $i++;
                }
            }
            $resultat = $this->executerRequete($sql, array($q));
            return $resultat->fetchAll();


        } else {
            throw new \Exception("Veuillez entrer un nombre de caractères suffisant");
        }

    }
}


/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 12/04/2017
 * Time: 10:38
 */