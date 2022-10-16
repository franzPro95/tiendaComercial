<?php 
	class Clientes extends Controllers{
		public function __construct()
		{
			//session_start();
			parent::__construct();
			/*if (empty($_SESSION['login'])) {
				header('Location:'.base_url().'/loguin');
			}*/
		}

		public function clientes()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Clientes";
			$data['page_title'] = "Página de Clientes";
			$data['page_name'] = "clientes";
			$this->views->getView($this,"clientes",$data);
		}
	}
?>