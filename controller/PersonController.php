<?php

namespace Controller; //On crée le namespace Controller pour pouvoir accéder à notre classe ci-dessous dans les autres fichiers
use Model\Connect; //On fait appel au namespace Model pour accéder à la méthode "seConnecter" de la classe Connect

class PersonController {
    /** Detail acteur **/
    public function detailActeur($id) {
        $pdo = Connect::seConnecter();
        $requeteDetailActeur = $pdo->prepare("SELECT p.first_name, p.last_name, p.birthday,p.nationality, p.filmography, FLOOR(DATEDIFF(CAST(NOW() AS DATE), p.birthday) / 365.25) AS age FROM actor a INNER JOIN person p ON a.id_person = p.id_person WHERE a.id_actor = :id");
        $requeteDetailActeur->execute(["id" => $id]);
        require "view/acteur/detailActeur.php";
    }
}