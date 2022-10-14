<?php 
	class Home extends Controllers{
		public function __construct()
		{
			session_start();
			parent::__construct();
			if (empty($_SESSION['login'])) {
				header('Location:'.base_url().'/loguin');
			}
		}

		public function home()
		{
			$user=$_SESSION['userData'];
			if ($user['rol']=="VENDEDOR"){
				header('Location:'.base_url().'/ventas/ventascon');
			}
			if ($user['rol']=="COMPRADOR"){
				header('Location:'.base_url().'/compras');
			}
			if ($user['rol']=="ALMACENERO"){
				header('Location:'.base_url().'/productos/inventario');
			}
			$data['page_id'] = 1;
			$data['page_tag'] = "Home";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"home",$data);
		}
	}
?>