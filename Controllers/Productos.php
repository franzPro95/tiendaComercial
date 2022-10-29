<?php 
	class Productos extends Controllers{
		public function __construct()
		{
			//session_start();
			parent::__construct();
			/*if (empty($_SESSION['login'])) {
				header('Location:'.base_url().'/loguin');
			}*/
		}

		public function productos()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Productos";
			$data['page_title'] = "Página de Productos";
			$data['page_name'] = "productos";
			$this->views->getView($this,"productos",$data);
		}
	}
?>