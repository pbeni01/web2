<?php

class Kapcsolatadmin_Controller
{
	public $baseName = 'kapcsolatadmin';
	public function main(array $vars) 
	{
		include_once(SERVER_ROOT.'models/kapcsolatadmin_model.php');
		$kapcsolatadminModel = new Kapcsolatadmin_Model; 
		$retData = $kapcsolatadminModel->get_data(); 
		$view = new View_Loader($this->baseName."_main");
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>