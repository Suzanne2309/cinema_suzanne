<?php ob_start(); ?>

<div class="header">
    <article>
        <h2>Vous en avez marre de scroller pour choisir un film ?</h2>
        <div class="container">
            <p>Attrapez votre popcorn, installez-vous confortablement dans votre canapé et laissez-vous surprendre par notre sélection réduite.</p>
            <button>Faites votre choix !</button>
        </div>
    </article>
</div>

<div class="project">
    <div class="logo">
        <img src="public/img/logo_popcorn.svg" alt="un pot rouge et blanc avec du popcorn à l'intérieur">
        <h2>POPCORN</h2>
    </div>
    <div class="cards">
        <div class="card">
            <h2>Quel est son but ?</h2>
            <p>Avec Popcorn, vous accédez directement à une sélection réduite de films pour faire un choix rapide et sans prise de tête. Vous pouvez parcourir la liste, consulter les informations essentielles et lancer votre séance détente en un instant. Envie d’élargir vos options ? Ajoutez facilement vos propres films pour personnaliser votre catalogue selon vos goûts. Popcorn s’adapte à vous et à vos envies du moment.</p>
        </div>
        <div class="card">
            <h2>Comment est née Popcorn ?</h2>
            <p>Popcorn a vu le jour dans le cadre de ma formation de Développement Web et Web Mobile, pour  mettre en pratique mes compétences en MCD, SQL, maquettage (Figma), HTML, CSS, JavaScript et PHP. Ma liste de films étant minimaliste, je me suis dit pourquoi pas en faire le concept du projet ? Popcorn a donc été pensé pour vous simplifier la vie, vous faire gagner du temps et vous permettre de profiter vraiment de votre pause détente. Installez-vous confortablement… Popcorn s’occupe du reste.</p>
        </div>
        <div class="card">
            <h2>Pourquoi utiliser Pocorn ?</h2>
            <p>Parce qu’on est nombreux à vouloir regarder un film sans trop savoir quoi choisir. Vous avez envie d’un certain genre sans réussir à le définir, ou vous souhaitez tout simplement redécouvrir un classique ou tenter une nouveauté.Avec la multitude de contenus présents sur les plateformes, on peut vite se perdre et passer plus de temps à chercher qu’à apprécier son moment détente. Grâce à notre selection réduite, le choix est vite fait !</p>
        </div>
    </div>
</div>

<div class="inscription">
    <div class="overlay">
        <article>
            <h2>Mettez votre pierre a l’edifice !</h2>
            <p>Vous avez des idées de films à partager ou des coups de cœur à ne pas garder pour vous ? Créez votre compte et ajoutez vos propositions en quelques clics. Contribuez à enrichir la sélection et aidez d’autres utilisateurs à trouver leur prochain film sans hésitation. Popcorn évolue avec vous !</p>
        </article>
        <button>Inscription</button>
    </div>
    <div class="image">
        <img src="public/img/femme_reflexion.jpg" alt="Une femme avec des lunettes et haut rouge, regardant vers le haut pour réfléchir">
    </div>
</div>

<?php
//On définit les variables et seront les paramètres dont il faudra définir la valeur à CHAQUE VUE
$titre = "Accueil"; 
$titre_secondaire = "Accueil";
$contenu = ob_get_clean(); //On définit la variable contenu qui va donc permettre d'être la mémoire tampon stockant les résultats des requêttes
require "view/template.php"; //Require va permettre d'injecter le contenu dans le fichier template (le squelette), qui va donc contenir les variables qui permettent de stocker les résultats des requêttes de nos différents vues