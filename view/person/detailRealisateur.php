<?php ob_start(); //On démarre la vue avec ob_start ce qui va permettre de pouvoir exécuter plusieurs rêquettes en même temps, en stockant les résultats dans la mémoire tampon (ici la variable $contenu)

$realisateur = $requeteDetailRealisateur->fetch(); ?>
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
            <tr>
                <td><?php echo $realisateur["last_name"]; ?> <?php echo $realisateur["first_name"];?></td>
                <td><?php echo $realisateur["birthday"]; ?></td>
                <td><?php echo $realisateur["age"]; ?></td>
                <td><?php echo $realisateur["nationality"]; ?></td>
                <td><?php echo $realisateur["filmography"]; ?></td>
            </tr>

    </tbody>
</table>

<div>
    <h2>filmographie : </h2>
    <?php foreach($requeteFilmographie->fetchALL() as $filmographie) { ?>
        <p><a href="index.php?action=detailFilm&id=<?= $filmographie['id_movie'] ?>"><?= $filmographie["title"]; ?></a>, <?= $filmographie["realease_date"];?></p>
    <?php } ?>

</div>

<p>Vous avez pas trouvé votre bonheur ? Ajouter votre film en un click !</p>
<button><a href="#">+</a></button>

<?php

//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Détail d'un réalisateur"; 
$titre_secondaire = "Détail d'un réalisateur";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues