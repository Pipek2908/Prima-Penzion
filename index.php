<?php
require_once "./data.php";


$idStranky = array_keys($poleStranek)[0];


if (array_key_exists("id-stranky", $_GET)) {
    $idStranky = $_GET["id-stranky"];

    
    if (!array_key_exists($idStranky, $poleStranek)) {
        $idStranky = "404";
    }
    
}



?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $poleStranek[$idStranky]->titulek; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="container">

            <div class="headerTop">
                <a class="odkaz" href="tel:+420606123456">+420 / 606 123 456</a>
                <div class="socIkon">
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>

                    <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>

                    <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <a href="#" class="logo">Prima <br>Penzion</a>

            <?php
            require "./menu.php";
            ?>
        </div>

        <img src="img/<?php echo $poleStranek[$idStranky]->obrazek;?>" alt="PrimaPenzion">
    </header>

    <!-- zde budeme pripojovat HTML soubory -->
    <?php  
    echo $poleStranek[$idStranky]->getObsah();
    ?>

    <footer>
        <div class="pata">
            <?php
            require "./menu.php";
            ?>
            <a href="#" class="logo">Prima <br>Penzion</a>

            <div class="kontakty">
                <p><i class="fa-regular fa-map"></i>
                    <a href="https://maps.app.goo.gl/uABGvLyQFD9Phe686" target="_blank"><b>PrimaPenzion</b>, Jablonského
                        2, Praha 7</a>
                </p>
                <p><i class="fa-regular fa-comment"></i>
                    <a href="tel:+420606123456">+420 / 606 123 456</a>
                </p>
                <p><i class="fa-regular fa-paper-plane"></i><span>info@primapenzion.cz</span></a>
                </p>
            </div>

            <div class="socIkon">
                <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>

                <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>

                <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>

        </div>

        <div class="copyright">
            &copy; <b>Primapenzion</b> 2024</div>
    </footer>
</body>

</html>