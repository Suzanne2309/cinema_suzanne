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
        "); //on va executer la requette sql de notre choix (ici afficher le titre et la date de sortie des films du tableau movie       
        require "view/listFilms.php"; //On utilise un require pour relier à la vue(fichier view) qui nous intéresse (ici le fichier ListFilms.php)
    }

    /** Detail film **/
    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailFilm = $pdo->prepare("SELECT m.id_movie, m.title, m.realease_date, m.notation, p.first_name, p.last_name, DATE_FORMAT(SEC_TO_TIME(m.duration * 60), '%H:%i') AS film_duration FROM movie m INNER JOIN director d ON m.id_director = d.id_director INNER JOIN person p ON d.id_person = p.id_person WHERE id_movie = :id");
        $requeteDetailFilm->execute(["id" => $id]);
    
    /** casting d'un film **/
        $pdo = Connect::seConnecter();
        $requeteCasting = $pdo->prepare("SELECT p.first_name, p.last_name, r.character, FLOOR(DATEDIFF(CAST(NOW() AS DATE), p.birthday) / 365.25) AS age FROM casting c INNER JOIN movie m ON c.id_movie = m.id_movie INNER JOIN actor a ON c.id_actor=a.id_actor INNER JOIN person p ON a.id_person=p.id_person INNER JOIN role r ON c.id_role = r.id_role WHERE c.id_movie = :id");
        $requeteCasting->execute(["id" => $id]);
        require "view/detailFilm.php";
    }
}