<?php

class Kilepes_Controller
{
    public $baseName = 'kilepes'; 

    public function main(array $vars) 
    {
        session_start();
        session_unset(); 
        session_destroy(); 

        header("Location: " . SITE_ROOT . "belepes");
        exit();
    }
}

?>
