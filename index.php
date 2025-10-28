<?php

use Controller\CinemaController; //Comme on a catégoriser virtuellement (stocké la classe en question dans un espace de nom), on va pouvoir fair eappel à la classe grâce à use, et indiquant le chemin des fichier

spl_autoload_register(function($class_name) { //Comme on a pu faire appel ) la classe, ici on va la charger automatiquement, autrement dit elle va se charger toute seule grâce à spl_autoload-register
    include $class_name. '.php';
});

$ctrlCinema = new CinemaController(); //on instancie le nouvel objet ConemaController

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {  //SI la variable est définie (déclarée et non-null), alors on va chercher action 
    switch ($_GET["action"]) { //Quand on va chercher action, deux situations vont être analysé par Switch
        case "listFilms" : $ctrlCinema->listFilms(); break; //action va récupérer la liste des films (les informations des films) dans la classe controllerCinema
        case "detailFilm" : $ctrlCinema->detailFilm($id); break; //action va récupérer la liste des acteurs à travers de casting dans la classe controllerCinema
    }
}
