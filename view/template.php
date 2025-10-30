<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <header>
        <div class="front_navbar">
            <div class="logo"><img src="public/img/logo_popcorn.svg" alt="un pot rouge et blanc avec du popcorn à l'intérieur"></div>
            <div class="search_bar"><input type="text" placeholder="Search..."></div>
        </div>
        <div class="back_navbar">
            <nav>
                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Films</a></li> <!-- mettre un overlay avec les différents films -->
                    <li><a href="">Genres</a></li> <!-- mettre un overlay avec les différents genres -->
                    <li><a href="">Personnalités</a></li> <!-- mettre un overlay avec option acteurs et réalisateurs -->
                </ul>
            </nav>
            <button class="connexion_navbar">Connexion</button>
        </div>
    </header>

    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">
                <h1>Popcorn</h1>
                <h2><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>

    <footer>
    <div class="logo">
        <img src="public/img/logo_popcorn.svg" alt="un pot rouge et blanc avec du popcorn à l'intérieur">
        <h2>POPCORN</h2>
    </div>
    <div class="navbar_footer">
            <nav class="footer">
                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Films</a></li> <!-- mettre un overlay avec les différents films -->
                    <li><a href="">Genres</a></li> <!-- mettre un overlay avec les différents genres -->
                    <li><a href="">Personnalités</a></li> <!-- mettre un overlay avec option acteurs et réalisateurs -->
                </ul>
            </nav>
            <small>@2025 Suzanne Pons</small>
    </div>
    <button>Connexion</button>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
