<?php

class Kapcsolat_Controller
{
	public $baseName = 'kapcsolat';
    
	public function main(array $vars)
	{
        
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            echo "igen";
            echo " ",$vars["email"];
            include_once(SERVER_ROOT.'models/kapcsolat_model.php');
            $kapcsolatmodel=new Kapcsolat_Model;
            $retData=$kapcsolatmodel->send_data($vars);
		    $view = new View_Loader($this->baseName."_main");
            foreach ($retData as $name => $value) {
                $view->assign($name, $value);
            }
        }
        else{
            $view = new View_Loader($this->baseName."_main");
        }
	}
}

?>