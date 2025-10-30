<?php ob_start(); //On démarre la vue avec ob_start ce qui va permettre de pouvoir exécuter plusieurs rêquettes en même temps, en stockant les résultats dans la mémoire tampon (ici la variable $contenu)

$acteur = $requeteDetailActeur->fetch(); ?>
<table class="uk-label uk-table-striped"> <!-- On crée un tableau pour afficher la liste des films, avec leur titre et date de sortie -->
    <thead> <!-- On définit la ligne des titres des colonnes -->
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>DATE DE NAISSANCE</th>
            <th>AGE</th>
            <th>NATIONALITE</th>
            <th>PARTICIPATION FILMS ET SERIES</th>
        </tr>
    </thead>
    <tbody> <!-- On définit le contenue des colonnes -->
         <!-- On va crée une boucle qui va interprêter les données envoyés par la requêtte (fetchALL : ALL car la requêtte est sur plusieurs lignes) sous forme de tableau -->
            <tr>
                <td><?php echo $acteur["last_name"]; ?> <?php echo $acteur["first_name"];?></td>
                <td><?php echo $acteur["birthday"]; ?></td>
                <td><?php echo $acteur["age"]; ?></td>
                <td><?php echo $acteur["nationality"]; ?></td>
                <td><?php echo $acteur["filmography"]; ?></td>
            </tr>
            <!--Donc à chaque nouvelle boucle, on va ajouter le titre et la date de sortie au film correspondant-->
    </tbody>
</table>

<div>
    <h2>filmographie : </h2>
    <?php foreach($requeteFilmographieActeur->fetchALL() as $filmographie) { ?>
        <p><a href="index.php?action=detailFilm&id=<?= $filmographie['id_movie'] ?>"><?= $filmographie["title"]; ?></a>, <?= $filmographie["realease_date"];?></p>
    <?php } ?>

</div>

<?php

//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Liste des acteurs"; 
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues