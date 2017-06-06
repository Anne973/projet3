<?php
namespace MonBlog\Modele;
use \MonBlog\Framework\Modele;
class Commentaire extends Modele{

    //Renvoie la liste des commentaires
    public function getListeCommentaires()
    {
        $sql = ('SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE ORDER BY DATE DESC ');
        $listecomments = $this->executerRequete($sql);
        return $listecomments;
    }
    //Renvoie les informations sur les commentaires associés à un billet

    public function getCommentaires($idBillet)
    {
        $sql = ('SELECT COM_ID AS id, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu, PARENT_ID FROM T_COMMENTAIRE WHERE BIL_ID=? ORDER BY DATE DESC');
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

    public function getCommentaire($id)
    {
        $sql = ('SELECT COM_ID AS id, BIL_ID AS bilid, COM_DATE AS date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu, COM_DEPTH AS depth FROM T_COMMENTAIRE WHERE COM_ID=?');
        $comment = $this->executerRequete($sql, array($id));
        return $comment->fetch();
    }


    //AJoute des commentaires dans la base
    public function ajouterCommentaire($auteur,$contenu,$idBillet, $depth=0, $parentid =NULL)
    {
        $sql = 'INSERT INTO T_COMMENTAIRE (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, COM_DEPTH, PARENT_ID) VALUES (NOW(), ?, ?, ?, ?, ?)';

        $this->executerRequete($sql, array($auteur,$contenu, $idBillet, $depth, $parentid));
    }

    //Renvoie le nombre total de commentaires
    public function getNombreCommentaires()
    {
        $sql='SELECT COUNT(*) as nbCommentaires from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne=$resultat->fetch();
        return $ligne['nbCommentaires'];
    }
    //Renvoie le nombre de commentaires signalés
    public function getNombreCommentairesSignales()
    {
        $sql='SELECT COUNT(*) as nbCommentairesSignales from T_COMMENTAIRE WHERE COM_SIGN=1';
        $resultat=$this->executerRequete($sql);
        $ligne=$resultat->fetch();
        return $ligne['nbCommentairesSignales'];
    }
    //Signale un commentaire
    public function signalerCommentaire($idCommentaire)
    {
        $sql ='UPDATE T_COMMENTAIRE SET COM_SIGN=1 WHERE COM_ID =?';

        $this->executerRequete($sql,array($idCommentaire));
    }
    //Retourne les commentaires signalés
    public function getCommentairesSignales()
    {

        $sql = ('SELECT COM_ID AS id, COM_DATE as date, COM_AUTEUR AS auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE WHERE COM_SIGN=1 ORDER BY COM_ID DESC');
        $commentairesSignales = $this->executerRequete($sql);

        return $commentairesSignales;
    }


    public function deleteCommentaire($idCommentaire)
    {
        $sql=('DELETE FROM T_COMMENTAIRE WHERE COM_ID=?');
        $this->executerRequete($sql, array($idCommentaire));
    }

    public function validateCommentaire($idCommentaire)
    {
        $sql=('UPDATE T_COMMENTAIRE SET COM_SIGN=0 WHERE COM_ID=?');
        $this->executerRequete($sql,array($idCommentaire));
    }

}
/**
 * Created by PhpStorm.
 * User: Anne
 * Date: 12/04/2017
 * Time: 10:44
 */
