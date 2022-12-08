<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Ticketing</title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index5.php"><h1 id="titreBlog">Ticketing</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste Ticketing.</p>
            </header>
            <div id="contenu">
                <?php
        $user = "administrateur";
        $password = "simone";
        $database = "ticketing";

        $bdd = new PDO("mysql:host=localhost;dbname=$database;charset=utf8", $user, $password);
                $billets = $bdd->query('select TIC_ID as id, TIC_DATE as date,'
                        . ' TIC_TITRE as titre, TIC_CONTENU as contenu , ETAT_LIB as lib   from T_TICKETS , T_ETAT WHERE T_ETAT.ETAT_ID=T_TICKETS.TIC_ID '
                        . ' order by TIC_ID desc');
                foreach ($billets as $billet):
                    ?>
                    <article>
                        <header>
                            <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
                            <time><?= $billet['date'] ?></time>
                        </header>
                        <p><?= $billet['contenu'] ?></p>
                        <p><?= $billet['lib'] ?></p>
                    </article>
                    <hr />
                <?php endforeach; ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Ticketing réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
