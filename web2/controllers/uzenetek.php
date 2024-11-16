<?php
require_once SERVER_ROOT . 'models/uzenetek_model.php';

class Uzenetek_Controller
{
    public $baseName = 'uzenetek';  

    public function main(array $vars) 
    {
        include_once(SERVER_ROOT.'models/uzenetek_model.php');
        $uzenetekModel = new Uzenetek_Model;  

        // Ha POST kérés (új üzenet küldése)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uzenet'])) {
            $vars['nev'] = $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'];
            $uzenetekModel->addMessage($vars);
        }

        // Üzenetek lekérése
        $retData = $uzenetekModel->getMessages();

        $view = new View_Loader($this->baseName.'_main');

        // Átadjuk az adatokat a nézetnek
        foreach($retData as $name => $value)
            $view->assign($name, $value);
    }
}



?>
