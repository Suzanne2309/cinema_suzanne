<?php

namespace Model; //Ici on défini le namespace Model qui permettra de catégoriser virtuellement la classe Connect

abstract class Connect { //On définie la classe en abstrait car on n'instanciera pas la classe COnnect mais on vue juste utiliser sa méthode "seConnecter"
    //On définie les variables constante de la classe
    const HOST = "localhost";  //le stockage en localhost
    const DB = "cinema"; //la base de données Cinema
    const USER = "root"; 
    const PASS = ""; 

    //On crée la méthode "seConnecter" en public pour pouvoir y accéder mais ne plus on ajoute static pour permettre d'y accéder de partout/ tous les fichiers
    public static function seConnecter() { 
        try { 
            return new \PDO(  //On va utilsier ici une classe native PDO, et on indique au framework qu'elle est native grâce à \ devant
                "mysql:host=".self::HOST."dbname=".self::DB.";charset=utf8", self::USER, self::PASS 
            );
        } catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}