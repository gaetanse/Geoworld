<?php
session_start();
require_once 'inc\connect-db.php';
require_once 'inc\manager-db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Accueil - Projet</title>
    <link rel="stylesheet" type="text/css" href="semantic/components/reset.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/site.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/container.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/grid.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/header.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/image.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/menu.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/label.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/table.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/form.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/flag.css">

    <link rel="stylesheet" type="text/css" href="semantic/components/divider.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/segment.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/button.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/list.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/icon.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/transition.css">
    <link rel="stylesheet" type="text/css" href="semantic/components/calendar.css">

    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://d3js.org/topojson.v1.min.js"></script>
    <!-- I recommend you host this file on your own, since this will change without warning -->
    <script src="js/datamaps.world.min.js?v=1"></script>

    <script src="js/jquery.vmap.js"></script>
    <script src="js/jquery.vmap.world.js"></script>
    <script src="js/jquery.vmap.sampledata.js"></script>

    <!-- Regles CSS définies ou redéfinies, pour cette application -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>

    <script src="assets/library/jquery.min.js"></script>
    <script src="semantic/components/visibility.js"></script>
    <script src="semantic/components/sidebar.js"></script>
    <script src="semantic/components/transition.js"></script>
    <script>
        $(document)
            .ready(function () {
                console.log("execution de codes JS après chargement de la page");

                $('.ui.menu a.item')
                    .on('click', function () {
                        $(this)
                            .addClass('active')
                            .siblings().removeClass('active')
                        ;
                    })

                ;
            })
        ;
    </script>



</head>
<body>
<div class="ui pointing menu inverted fixed">

    <div class="ui container">
        <div class="ui simple dropdown item">
            Continents <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="index.php?continent=Asia">Asie</a>
                <a class="item" href="index.php?continent=Europe">Europe</a>
                <a class="item" href="index.php?continent=North%20America">Amerique du Nord</a>
                <a class="item" href="index.php?continent=South%20America">Amerique du Sud</a>
                <a class="item" href="index.php?continent=Oceania">Oceanie</a>
                <a class="item" href="index.php?continent=Africa">Afrique</a>
                <a class="item" href="index.php?continent=Antarctica">Antarctique</a>
            </div>
        </div>

        <a class="ui item" href='villes.php'>
            Villes
        </a>

        <div class="item">
            <div class="ui icon input">
                <form method="post" action="recherche.php">
                    <input name="Tpays" type="text" placeholder="Chercher un pays ...">
                    <input type="submit" name="pays" style="background: url('images/loupe.png') no-repeat center;"
                           value="      "/>
                </form>
            </div>
        </div>

        <div class="item">
            <div class="ui icon input">
                <form method="post" action="recherche.php">
                    <input name="Tville" type="text" placeholder="Chercher une ville ...">
                    <input type="submit" name="ville" style="background: url('images/loupe.png') no-repeat center;"
                           value="      "/>
                </form>
            </div>
        </div>

    </div>


    <div class="right menu">
        <?php
        if (isset($_SESSION['nom']) && ($_SESSION['role']) == 0) {

        ?>

        <a class="ui item" href="gestion_user.php">
            <?php
            echo $_SESSION['nom'];
            echo " (User)";
            }

            ?>
        </a>

        <?php
        if (isset($_SESSION['nom']) && ($_SESSION['role']) == 1) {

        ?>

        <a class="ui item" href="gestion_admin.php">
            <?php
            echo $_SESSION['nom'];
            echo " (Admin)";
            }
            ?>
        </a>


        <?php if (isset($_SESSION['nom'])) {
            ?>
            <a class="ui item" href="logout.php">
                Deconnexion
            </a>
            <?php
        } else {
            ?>
            <a class="ui item" href="login.php">
                Login
            </a>
            <?php
        }
        ?>

        <?php if (isset($_SESSION['nom'])) {
            ?>
            <?php
        } else {
            ?>
            <a class="ui item" href="inscription.php">
                Inscription
            </a>
            <?php
        }
        ?>
        <a class="ui item" href="todo-projet.php">
            ProjetPPE
        </a>
    </div>
</div>
