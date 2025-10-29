<?php

use Controller\CinemaController; //Comme on a catégoriser virtuellement (stocké la classe en question dans un espace de nom), on va pouvoir fair eappel à la classe grâce à use, et indiquant le chemin des fichier
use Controller\PersonController;
use Controller\HomeController;

spl_autoload_register(function($class_name) { //Comme on a pu faire appel à la classe, ici on va la charger automatiquement, autrement dit elle va se charger toute seule grâce à spl_autoload-register
    include $class_name. '.php';
});

$ctrlCinema = new CinemaController(); //on instancie le nouvel objet ConemaController
$ctrlPerson = new PersonController();
$ctrlHome = new HomeController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {  //SI la variable est définie (déclarée et non-null), alors on va chercher action 
    switch ($_GET["action"]) { //Quand on va chercher action, deux situations vont être analysé par Switch
        case "listFilms" : $ctrlCinema->listFilms(); break; //action va récupérer la liste des films (les informations des films) dans la classe controllerCinema
        case "detailActeur" : $ctrlPerson->detailActeur($id); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break; //action va récupérer la liste des acteurs à travers de casting dans la classe controllerCinema
        case "detailRealisateur" : $ctrlCinema->detailRealisateur($id); break;
        case "default" : $ctrlHome->home(); break;
    }
}