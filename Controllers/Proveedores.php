<?php 
	class Proveedores extends Controllers{
		public function __construct()
		{
			//session_start();
			parent::__construct();
			/*if (empty($_SESSION['login'])) {
				header('Location:'.base_url().'/loguin');
			}*/
		}

		public function proveedores()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Proveedores";
			$data['page_title'] = "Página de Proveedores";
			$data['page_name'] = "proveedores";
			$this->views->getView($this,"proveedores",$data);
		}
	}
?>