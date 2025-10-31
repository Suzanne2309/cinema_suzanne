<?php ob_start(); ?> <!-- On démarre la vue avec ob_start ce qui va permettre de pouvoir exécuter plusieurs rêquettes en même temps, en stockant les résultats dans la mémoire tampon (ici la variable $contenu)-->

<p class="uk-label uk-label-warning">Il y a <?= $requeteActeurs->rowCount() ?> Acteurs</p> <!-- On va utiliser une fonction native de l'extension PDO, "rowCount", pour compter le nombre de ligne qui seront dans notre requêtte. Chaque ligne correspondant à un film, cela correspond à compter le nombre de films -->

<table class="uk-label uk-table-striped"> <!-- On crée un tableau pour afficher la liste des films, avec leur titre et date de sortie -->
    <thead> <!-- On définit la ligne des titres des colonnes -->
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody> <!-- On définit le contenue des colonnes -->
        <?php foreach($requeteActeurs->fetchALL() as $acteurs) { ?> <!-- On va crée une boucle qui va interprêter les données envoyés par la requêtte (fetchALL : ALL car la requêtte est sur plusieurs lignes) sous forme de tableau -->
            <tr>
                <td><a href="index.php?action=detailActeur&id=<?= $acteurs['id_actor'] ?>"><?= $acteurs["last_name"]?> <?= $acteurs["first_name"]?></a></td> <!-- On va ajouter dans le tableau film, le titre du film -->
                <td><?= $acteurs["age"]?></td>
            </tr>
            <?php } ?> <!--Donc à chaque nouvelle boucle, on va ajouter le titre et la date de sortie au film correspondant-->
    </tbody>
</table>

<p>Vous avez pas trouvé votre bonheur ? Ajouter votre acteur en quelques clicks !</p>
<form action="index.php?action=listGenres" method="post">
    <label for="first_name">Prénom : </label>
    <input type="text"  name="first_name" placeholder="Prénom">
    <label for="last_name">Nom : </label>
    <input type="text"  name="last_name" placeholder="Nom">
    <label for="birthday">Date de naissance : </label>
    <input type="text"  name="birthday" placeholder=" Format : Année-Mois-Jour">
    <label for="nationality">Nationalité : </label>
    <input type="text"  name="nationality" placeholder="Nationalité">
    <label for="sexe">Sexe : </label>
    <input type="text"  name="sexe" placeholder="Sexe">
    <label for="filmography">Nombre de séries et films : </label>
    <input type="text"  name="filmography" placeholder="n°">
    <fieldset>
        <legend>Quel est son métier ? (choix multiple possible)</legend>
        <div>
            <label for="actor">Acteur</label>
            <input type="checkbox" id="actor" name="actor">
        </div>
        <div>
            <label for="director">Réalisateur</label>
            <input type="checkbox" id="director" name="director">
        </div>
    </fieldset>
    <button type="submit" name="submit">Ajouter</button> <!-- Penser à name le button submit car sinon $_POST n'aura pas la donnée -->
</form>

<?php

//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Liste des Acteurs"; 
$titre_secondaire = "Liste des Acteurs";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues