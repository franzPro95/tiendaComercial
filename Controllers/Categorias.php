<?php 
	class Categorias extends Controllers{
		public function __construct()
		{
			//session_start();
			parent::__construct();
			/*if (empty($_SESSION['login'])) {
				header('Location:'.base_url().'/loguin');
			}*/
		}

		public function categorias()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "CAtegorias";
			$data['page_title'] = "Página de CAtegorias";
			$data['page_name'] = "categorias";
			$this->views->getView($this,"categorias",$data);
		}
	}
?>