<?php
$instanceDB = new PDO(
    "mysql:host=127.0.0.1:3306;dbname=penzion;charset=utf8mb4",
    "root",
    "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);


class Stranka {
    public $oldId = "";
    public $id;
    public $obrazek;
    public $titulek;
    public $menu;

    function __construct($argId, $argObrazek, $argTitulek, $argMenu) {
        $this->id = $argId;
        $this->obrazek = $argObrazek;
        $this->titulek = $argTitulek;
        $this->menu = $argMenu;
    }

    static function seradStranky($argPoleId) {
        foreach($argPoleId AS  $index => $id) {
            $prikaz = $GLOBALS["instanceDB"]->prepare("UPDATE stranka SET poradi=?WHERE id=?");
            $prikaz->execute(array($index, $id));
        }
    }

    function getObsah() {
         
        $prikaz = $GLOBALS["instanceDB"]->prepare("SELECT * FROM stranka WHERE id=?");
        $prikaz->execute(array($this->id));
        
        $vysledek = $prikaz->fetch(PDO::FETCH_ASSOC);

        //pokud stranka v databazi neexistuje, tak vraitme prazdny
        if ($vysledek == false) {
            return "";
        }

        $obsahStranky = $vysledek["obsah"];
        
        
        return $obsahStranky;
    }

    function setObsah($argNovyObsah) {
        $prikaz = $GLOBALS["instanceDB"]->prepare("UPDATE stranka SET obsah=? WHERE id=?");
        $prikaz->execute(array($argNovyObsah, $this->id));        
        
    }

    //tato metoda vezme vlasntosit instance a provede update do DB
    function zapisMetaData() {
        if ($this->oldId == "") {
            $prikaz = $GLOBALS["instanceDB"]->prepare("SELECT * FROM stranka ORDER BY poradi DESC");
            $prikaz->execute(array());
            //chceme jenom ten horni zaznam
            $vysledek = $prikaz->fetch();
            if ($vysledek != false) {
                $poradi = $vysledek["poradi"];
                $poradi++;
            }else{
                $poradi = 0;
            }

            $prikaz = $GLOBALS["instanceDB"]->prepare("INSERT INTO stranka SET id=?, titulek=?, menu=?, obrazek=?, poradi=?");
            $prikaz->execute(array($this->id, $this->titulek, $this->menu, $this->obrazek, $poradi));
        }else{
            $prikaz = $GLOBALS["instanceDB"]->prepare("UPDATE stranka SET id=?, titulek=?, menu=?, obrazek=? WHERE id=?");
            $prikaz->execute(array($this->id, $this->titulek, $this->menu, $this->obrazek, $this->oldId));
        }
    }

    function smazSe() {
        $prikaz = $GLOBALS["instanceDB"]->prepare("DELETE FROM stranka WHERE id=?");
        $prikaz->execute(array($this->id));
    }

} //endStranka




$poleStranek = array();
$prikaz = $instanceDB->prepare("SELECT * FROM stranka ORDER BY poradi ASC");
$prikaz->execute(array());
$poleVysledku = $prikaz->fetchAll();
foreach($poleVysledku AS $vysledek) {
    $poleStranek[$vysledek["id"]] = new Stranka($vysledek["id"], $vysledek["obrazek"], $vysledek["titulek"], $vysledek["menu"]);
}





