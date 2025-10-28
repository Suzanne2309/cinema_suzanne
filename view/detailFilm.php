<?php ob_start(); ?> <!-- On démarre la vue avec ob_start ce qui va permettre de pouvoir exécuter plusieurs rêquettes en même temps, en stockant les résultats dans la mémoire tampon (ici la variable $contenu)-->

<table class="uk-label uk-table-striped"> <!-- On crée un tableau pour afficher la liste des films, avec leur titre et date de sortie -->
    <thead> <!-- On définit la ligne des titres des colonnes -->
        <tr>
            <th>TITRE</th>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody> <!-- On définit le contenue des colonnes -->
        <?php foreach($requeteDetFilm->fetch() as $detFilm) { ?> <!-- On va crée une boucle qui va interprêter les données envoyés par la requêtte (fetchALL : ALL car la requêtte est sur plusieurs lignes) sous forme de tableau -->
            <tr>
                <td><?= $detFilm["title"] ?></td>
                <td>Réalisateur : <?= $detFilm["firest_name"] ?> <?= $detFilm["last_name"]?></td>
                <td>Durée : <?= $detFilm["film_duration"]?></td>
                <td>Année de sortie : <?= $detFilm["realease_date"]?></td>
                <td>Note : <?= $detFilm["note"]?></td>
            </tr>
            <?php } ?> <!--Donc à chaque nouvelle boucle, on va ajouter le titre et la date de sortie au film correspondant-->
    </tbody>
</table>


<?php

//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Liste des acteurs"; 
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues