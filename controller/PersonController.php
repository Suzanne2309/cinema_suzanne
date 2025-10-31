<?php

namespace Controller; //On crée le namespace Controller pour pouvoir accéder à notre classe ci-dessous dans les autres fichiers
use Model\Connect; //On fait appel au namespace Model pour accéder à la méthode "seConnecter" de la classe Connect

class PersonController {
    /** Lister les acteurs **/
    public function listActeurs() { //On crée la méthode qui permettra d'afficher une liste des films
        $pdo = Connect::seConnecter(); //On fait appel à la classe native $pdo qui va donc créer une connexion à la méthode statique de la classe connect pour se connecter sur la base de donnée
        $requeteActeurs = $pdo->query("
        SELECT a.id_actor, p.first_name, p.last_name, FLOOR(DATEDIFF(CAST(NOW() AS DATE), p.birthday) / 365.25) AS age
        FROM actor a
        INNER JOIN person p ON a.id_person = p.id_person
        "); //on va executer la requette sql de notre choix (ici afficher le titre et la date de sortie des films du tableau movie
        require "view/person/listActeurs.php"; //On utilise un require pour relier à la vue(fichier view) qui nous intéresse (ici le fichier ListFilms.php)
    }

    /** Détail d'un acteur **/
    public function detailActeur($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailActeur = $pdo->prepare("SELECT p.first_name, p.last_name, p.birthday,p.nationality, p.filmography, FLOOR(DATEDIFF(CAST(NOW() AS DATE), p.birthday) / 365.25) AS age FROM actor a INNER JOIN person p ON a.id_person = p.id_person WHERE a.id_actor = :id");
        $requeteDetailActeur->execute(["id" => $id]);

        /** filmographie d'un Acteur **/
        $pdo = Connect::seConnecter();
        $requeteFilmographieActeur = $pdo->prepare("SELECT m.title, m.realease_date, m.id_movie FROM movie m INNER JOIN casting c ON m.id_movie = c.id_movie WHERE c.id_actor = :id");
        $requeteFilmographieActeur->execute(["id" => $id]);
        require "view/person/detailActeur.php";
    }

    /** Lister les réalisateurs **/
    public function listRealisateurs() { //On crée la méthode qui permettra d'afficher une liste des films
        $pdo = Connect::seConnecter(); //On fait appel à la classe native $pdo qui va donc créer une connexion à la méthode statique de la classe connect pour se connecter sur la base de donnée
        $requeteRealisateurs = $pdo->query(" 
        SELECT d.id_director, p.first_name, p.last_name, FLOOR(DATEDIFF(CAST(NOW() AS DATE), p.birthday) / 365.25) AS age
        FROM director d
        INNER JOIN person p ON d.id_person = p.id_person
        "); //on va executer la requette sql de notre choix (ici afficher le titre et la date de sortie des films du tableau movie       
        require "view/person/listRealisateurs.php"; //On utilise un require pour relier à la vue(fichier view) qui nous intéresse (ici le fichier ListFilms.php)
    }

    /** Détail d'un Réalisateur **/
    public function detailRealisateur($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailRealisateur = $pdo->prepare("SELECT p.first_name, p.last_name, p.birthday,p.nationality, p.filmography, FLOOR(DATEDIFF(CAST(NOW() AS DATE), p.birthday) / 365.25) AS age FROM director d INNER JOIN person p ON d.id_person = p.id_person WHERE d.id_director = :id");
        $requeteDetailRealisateur->execute(["id" => $id]);

        /** filmographie d'un Réalisateur **/
        $pdo = Connect::seConnecter();
        $requeteFilmographie = $pdo->prepare("SELECT m.title, m.realease_date, m.id_movie FROM movie m WHERE m.id_director = :id");
        $requeteFilmographie->execute(["id" => $id]);
        require "view/person/detailRealisateur.php";
    }

    /** Ajouter une personne + checkbox acteur/réalisateur **/

    public function ajouterPersonne() {
        $pdo = Connect::seConnecter();
        if(isset($_POST['submit'])){ //SI les données ajouté avec le bouton submit sont différents de null
        //ALORS elles sont filtré pour s'assurer que la variable soit pas faussée (malveillance, faute de frappe,...) avec filter_input
        $firstName = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //filter sanitize permet de "nettoyer" les données en retirant les balises html et d'encoder les charactères qui sont en dehors des normes ASCII (full special chars)
        $lastName = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $birthday = filter_input(INPUT_POST, "birthday", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nationality = filter_input(INPUT_POST, "nationality", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $filmography = filter_input(INPUT_POST, "filmography", FILTER_VALIDATE_INT);

        $actor = isset($_POST['actor']) ? 1 : 0;
        $director = isset($_POST['director']) ? 1 : 0;

            if($firstName && $lastName && $birthday && $nationality && $sexe && $filmography){  //SI on a la variable filtré
                $requeteAddPerson = $pdo->prepare("INSERT INTO person (first_name, last_name, birthday, nationality, sexe, filmography)
                VALUES (:first_name, :last_name, :birthday, :nationality, :sexe, :filmography)");
                $requeteAddPerson->execute(['first_name' => $first_name], ['last_name' => $last_name], ['birthday' => $birthday], ['nationality' => $nationality], ['sexe' => $sexe], ['filmography' => $filmography]);
            };

            if(!$actor && !$director) { //Si actor ET director n'est pas coché
                echo "Veuillez cocher au moins l'une des deux cases"; //ALORS on affiche un message d'erreur
                return;
            };

            if($actor && $director) { //Si actor OU director n'est pas coché
                $idPerson = $pdo->lastInsertedId();
                $requeteAddIdActor = $pdo->prepare("INSERT INTO actor (id_person)
                VALUES (:id)");
                $requeteAddIdActor->execute(["id" => $idPerson]);
                $requeteAddID = $pdo->prepare("INSERT INTO director (id_person)
                VALUES (:id)");
                $requeteAddIdDirector->execute(["id" => $idPerson]);
                require "view/accueil.php";

            } elseif ($actor) {
                $idPerson = $pdo->lastInsertedI();
                $requeteAddID = $pdo->prepare("INSERT INTO actor (id_person) VALUES (:id);");
                $requeteAddID->execute(["id" => $idPerson]);
                require "view/person/listActeurs.php";

            } else {
                $idPerson = $pdo->lastInsertedId();
                $requeteAddID = $pdo->prepare("INSERT INTO director (id_person) VALUES (:id);");
                $requeteAddID->execute(["id" => $idPerson]);  
                require "view/person/listRealisateurs.php";  
            }

        }
    }
}