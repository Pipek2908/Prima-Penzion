<nav>
    <ul>
    <?php
    foreach ($poleStranek AS $id => $stranka) {
        if ($stranka->menu == "") {
            continue;
        }
        
        echo "<li>
            <a href='?id-stranky={$id}'>{$stranka->menu}</a>
        </li>";
    }
    ?>
    </ul>
</nav>