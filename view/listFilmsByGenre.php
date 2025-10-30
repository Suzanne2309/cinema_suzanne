<?php ob_start(); ?> <!-- On démarre la vue avec ob_start ce qui va permettre de pouvoir exécuter plusieurs rêquettes en même temps, en stockant les résultats dans la mémoire tampon (ici la variable $contenu)-->

<p class="uk-label uk-label-warning">Il y a <?= $requeteListFilmsByGenre->rowCount() ?> films</p> <!-- On va utiliser une fonction native de l'extension PDO, "rowCount", pour compter le nombre de ligne qui seront dans notre requêtte. Chaque ligne correspondant à un film, cela correspond à compter le nombre de films -->

<table class="uk-label uk-table-striped"> <!-- On crée un tableau pour afficher la liste des films, avec leur titre et date de sortie -->
    <thead> <!-- On définit la ligne des titres des colonnes -->
        <tr>
            <th>TITRE</th>
            <th>ANNE SORTIE</th>
        </tr>
    </thead>
    <tbody> <!-- On définit le contenue des colonnes -->
        <?php foreach($requeteListFilmsByGenre->fetchALL() as $filmByGenre) { ?> <!-- On va crée une boucle qui va interprêter les données envoyés par la requêtte (fetchALL : ALL car la requêtte est sur plusieurs lignes) sous forme de tableau -->
            <tr>
                <td><a href="index.php?action=detailFilm&id=<?= $filmByGenre['id_movie'] ?>"><?= $filmByGenre["title"] ?></a></td> <!-- On va ajouter dans le tableau film, le titre du film -->
                <td><?= $filmByGenre["realease_date"] ?></td> <!-- On va ajouter la date de sortie du film correspondant au tableau -->
            </tr>
            <?php } ?> <!--Donc à chaque nouvelle boucle, on va ajouter le titre et la date de sortie au film correspondant-->
    </tbody>
</table>

<?php

//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Liste des films"; 
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues