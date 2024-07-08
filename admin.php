<?php
session_start();

require_once "./data.php";

//uzivatel se chce prihlasit
if (array_key_exists("login-submit", $_POST)) {
    $zadaneJmeno = $_POST["jmeno"];
    $zadaneHeslo = $_POST["heslo"];

    if ($zadaneJmeno == "admin" && $zadaneHeslo == "cici123") {
        $_SESSION["jePrihlasen"] = true;
    }
}

//uzivatel se chce odhlasit
if (array_key_exists("logout-submit", $_GET)) {
    unset($_SESSION["jePrihlasen"]);
    //procistit URL
    header("Location: ?");
}

//toto jsou operace, ktere lze provest jen kdyz je uzivtael prihlaseny

if (array_key_exists("jePrihlasen", $_SESSION)) {
    //zde budou ify ruznych operaci

    if (array_key_exists("razeniSubmit", $_POST)) {
        $poleId = $_POST["poleId"];

        
        Stranka::seradStranky($poleId);
        exit;
    }

    if (array_key_exists("delete", $_GET)) {
        $idStranky = $_GET["delete"];
        $poleStranek[$idStranky]->smazSe();

        header("Location: ?");
        exit;
    }

    if (array_key_exists("new", $_GET)) {
        
        $aktivniInstance = new Stranka("", "", "", "");
    }

    //uzivatel chce editovat
    if (array_key_exists("edit", $_GET)) {
        
        $idStranky = $_GET["edit"];
        
        $aktivniInstance = $poleStranek[$idStranky];
    }
    
    //uzivatel chce obsah ulozit
    if (array_key_exists("aktualizovat-submit", $_POST)) {
        $idStranky = trim($_POST["id-stranky"]);
        $titulekStranky = trim($_POST["titulek-stranky"]);
        $menuStranky = trim($_POST["menu-stranky"]);
        $obrazekStranky = trim($_POST["obrazek-stranky"]);

        //gaurding clause
        if ($idStranky == "") {
            //presmerujeme uzivatele zpet na admin sekci, protoze nechceme aby se do databaze ulozilo prazdne ID
            header("Location: ?");
            exit;
        }

        //nastavime instanci nove vlastnosti
        //ulozime si puvodni id do oldId
        $aktivniInstance->oldId = $aktivniInstance->id;
        //prenastavmie nove id
        $aktivniInstance->id = $idStranky;
        $aktivniInstance->titulek = $titulekStranky;
        $aktivniInstance->menu = $menuStranky;
        $aktivniInstance->obrazek = $obrazekStranky;
        //instance se touto funkci zapsiue do DB
        $aktivniInstance->zapisMetaData();

        $obsahStranky = $_POST["obsah-stranky"];
        $aktivniInstance->setObsah($obsahStranky);

        header("Location: ?edit={$idStranky}");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Admin sekce</h1>

    <?php

    if (array_key_exists("jePrihlasen", $_SESSION)) {
        echo "<p>Jste prihlaseny!</p>";
        echo "<a href='?logout-submit'>Odkaz pro odhlaseni</a>";

        echo "<ul id='seznam-stranek'>";
        foreach($poleStranek AS $stranka) {
            echo "<li id='{$stranka->id}'>
                <a href='?edit={$stranka->id}'>{$stranka->id}</a>
                <a class='mazaci-odkaz' href='?delete={$stranka->id}'>SMAZAT</a>
            </li>";
        }
        echo "</ul>";

        // toto je odkaz, ktery otevre editor pro vytvoreni nove stranky
        echo "<a href='?new'>Vytvorit novou stranku</a>";

        if (isset($aktivniInstance)) {
            require "./web-editor.php";
        }
        
    }else{
        require "./prihlasovaci-formular.php";
    }


    ?>

   

    <script src="./vendor/components/jquery/jquery.js"></script>
    <script src="./vendor/components/jqueryui/jquery-ui.js"></script>

    <script src="./js/admin.js"></script>
</body>
</html>