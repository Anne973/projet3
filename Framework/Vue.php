<?php
namespace MonBlog\Framework;
class Vue{

    //Nom du fichier associé à la vue
    private $fichier;
    //Titre de la vue
    private $titre;

    public function __construct($action, $controleur="")
    {
        //Determination du nom du fichier vue à partir de l'action
        $fichier="Vue/";
        if ($controleur !=""){
          $fichier=$fichier.$controleur."/";
        }
        $this->fichier=$fichier.$action.".php";

    }
    //génère et affiche la vue
    public function generer($donnees,$flash) {
        //génération de la partie spécifique de la vue
        $contenu=$this->genererFichier($this->fichier, $donnees);
        //on définit une variable locale accessible par la vue pour la racine web
        //il s'agit du chemin vers le site sur le serveur web
        //nécessaire pour les URI de type controleur/action/id
        $racineWeb=Configuration::get("racineWeb","/");
        //génération du gabarit commun
        $vue = $this->genererFichier('Vue/gabarit.php',array('titre' => $this->titre,'contenu' => $contenu,'racineWeb' => $racineWeb, 'flash'=>$flash));
        //Renvoi de la vue au navigateur
        echo $vue;

    }


    //génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees)
    {if(file_exists($fichier)) {
        //Rend les éléments du tableau données accessibles dans la vue
        extract($donnees);
        //Démarrage de la temporisation de sortie
        ob_start();
        //Inclut le fichier vue
        require $fichier;
        //Arrêt de la temporisation
        return ob_get_clean();
    }
    else {
    throw new \Exception("Fichier '$fichier' introuvable");
        }
    }

    //nettoie une valeur insérée dans une page html
    private function nettoyer($valeur){
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }

    //délimite le nombre de caractères du contenu à afficher en page d'accueil
    function limit_text( $text, $limit=1000000000) {
        if ( strlen ( $text ) < $limit ) {
            return $text;
        }
        $split_words = explode(' ', $text );
        $out = null;
        foreach ( $split_words as $word ) {
            if ( ( strlen( $word ) > $limit ) && $out == null ) {
                return substr( $word, 0, $limit )."...";
            }

            if (( strlen( $out ) + strlen( $word ) ) > $limit) {
                return $out . "...";
            }
            $out.=" " . $word;
        }
        return $out;
    }
}
