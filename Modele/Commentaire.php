<?php
namespace MonBlog\Modele;
use \MonBlog\Framework\Modele;
class Commentaire extends Modele{
    //Renvoie les informations sur les commentaires associés à un billet

    public function getCommentaires($idBillet)
    {
        $sql = ('SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu, PARENT_ID FROM T_COMMENTAIRE WHERE BIL_ID=?');
        $comments = $this->executerRequete($sql, array($idBillet));
        return $comments->fetchAll();
    }
   public function getCommentairesEnfants($idCommentaire){
       $sql = ('SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu, PARENT_ID FROM T_COMMENTAIRE WHERE PARENT_ID=?') ;
       $comments = $this->executerRequete($sql, array($idCommentaire));
       return $comments->fetchAll();
    }

    public function getCommentairesParents($idBillet)
    {
        $sql = ('SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu, PARENT_ID FROM T_COMMENTAIRE WHERE BIL_ID=? AND PARENT_ID IS NULL');
        $comments = $this->executerRequete($sql, array($idBillet));
        return $comments->fetchAll();
    }




    //AJoute des commentaires dans la base
    public function ajouterCommentaire($auteur,$contenu,$idBillet)
    {
        $sql = 'INSERT INTO T_COMMENTAIRE (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID) VALUES (NOW(), ?, ?, ?)';

        $this->executerRequete($sql, array($auteur,$contenu, $idBillet));
    }

    //Renvoie le nombre total de commentaires
    public function getNombreCommentaires()
    {
        $sql='SELECT COUNT(*) as nbCommentaires from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne=$resultat->fetch();
        return $ligne['nbCommentaires'];
    }
}
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 12/04/2017
 * Time: 10:44
 */