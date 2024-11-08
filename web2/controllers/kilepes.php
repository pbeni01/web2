<?php

class Kilepes_Controller
{
    public $baseName = 'kilepes'; // Meghatározni, hogy melyik oldalon vagyunk

    public function main(array $vars) // A router által továbbított paramétereket kapja
    {
        // Kilépés végrehajtása: munkamenet törlése
        session_start();
        session_unset(); // Minden munkamenet adatot töröl
        session_destroy(); // Munkamenet teljes megsemmisítése

        // Átirányítás a kezdőlapra vagy a belépés oldalra
        header("Location: " . SITE_ROOT . "belepes");
        exit();
    }
}

?>
