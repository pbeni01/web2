<?php

class Regisztracio_Controller
{
    public $baseName = 'regisztracio'; 

    public function main(array $vars) 
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include_once(SERVER_ROOT . 'models/regisztracio_model.php');
            $regisztracioModel = new Regisztracio_Model();
            $retData = $regisztracioModel->get_data($vars);

            $view = new View_Loader($this->baseName . "_main");
            foreach ($retData as $name => $value) {
                $view->assign($name, $value);
            }
        } else {
            $view = new View_Loader($this->baseName . "_main");
        }
    }
}

?>
