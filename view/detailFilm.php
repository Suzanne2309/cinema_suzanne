<?php ob_start(); //On démarre la vue avec ob_start ce qui va permettre de pouvoir exécuter plusieurs rêquettes en même temps, en stockant les résultats dans la mémoire tampon (ici la variable $contenu)

$detailFilm = $requeteDetailFilm->fetch(); ?>
<table class="uk-label uk-table-striped"> <!-- On crée un tableau pour afficher la liste des films, avec leur titre et date de sortie -->
    <thead> <!-- On définit la ligne des titres des colonnes -->
        <tr>
            <th>TITRE</th>
            <th>REALISATEUR</th>
            <th>DUREE</th>
            <th>ANNEE DE SORTIE</th>
            <th>NOTE</th>
        </tr>
    </thead>
    <tbody> <!-- On définit le contenue des colonnes -->
         <!-- On va crée une boucle qui va interprêter les données envoyés par la requêtte (fetchALL : ALL car la requêtte est sur plusieurs lignes) sous forme de tableau -->
            <tr>
                <td><?php echo $detailFilm["title"]; ?></td>
                <td><?php echo $detailFilm["first_name"]; ?> <?php echo $detailFilm["last_name"];?></td>
                <td><?php echo $detailFilm["film_duration"]; ?></td>
                <td><?php echo $detailFilm["realease_date"]; ?></td>
                <td><?php echo $detailFilm["notation"]; ?></td>
            </tr>
            <!--Donc à chaque nouvelle boucle, on va ajouter le titre et la date de sortie au film correspondant-->
    </tbody>
</table>

<div>
    <h2>Le casting du film : </h2>
    <?php foreach($requeteCasting->fetchALL() as $detailCasting) { ?>
        <p><?php echo $detailCasting["first_name"]; ?> <?php echo $detailCasting["last_name"];?>, <?php echo $detailCasting["age"]; ?>, dans le rôle de <?php echo $detailCasting["character"];?>.</p>
    <?php } ?>

</div>

<?php

//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Details du film"; 
$titre_secondaire = "Details du film";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues