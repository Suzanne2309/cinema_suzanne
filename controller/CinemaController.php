<?php

namespace Controller; //On crée le namespace Controller pour pouvoir accéder à notre classe ci-dessous dans les autres fichiers
use Model\Connect; //On fait appel au namespace Model pour accéder à la méthode "seConnecter" de la classe Connect

class CinemaController {

    /** Lister les films **/
    public function listFilms() { //On crée la méthode qui permettra d'afficher une liste des films
        $pdo = Connect::seConnecter(); //On fait appel à la classe native $pdo qui va donc créer une connexion à la méthode statique de la classe connect pour se connecter sur la base de donnée
        $requete = $pdo->query(" 
            SELECT title, realease_date
            FROM movie
        "); //on va executer la requette sql de notre choix (ici afficher le titre et la date de sortie des films du tableau movie)
        require "view/ListFilms.php"; //On utilise un require pour relier à la vue(fichier view) qui nous intéresse (ici le fichier ListFilms.php)
    }
}