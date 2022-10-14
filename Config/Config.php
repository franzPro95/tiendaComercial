<?php 
	
	//define("BASE_URL", "http://localhost/tienda_virtual/");
	const BASE_URL = "http://localhost:8080/tiendaComercial";
	//Zona horaria
	date_default_timezone_set('America/La_Paz');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "tienda_comercial";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "Bs";
	//DATOS DE LA EMPRESA
	const DIRECCION='';
	const NOMBRE_EMPRESA='';
	const EMAIL='';
	const TELEMPRESA='';
	const WHATSSAPP='+59175985771';
	const CAT_SLIDER='1,2,3';
	const BANER='4,5,6';
    const METHODOENCRIPT="AES-128-ECB";
    const KEY='franz';
    const BUSCAR=4;
    const CATFOOTER='1,2,3,4,5,6';
    const DESCRIPTION="";
    const SHERETHASH='TiendaVirtual multiPlus';
    const EMAILCONTACTO="mvmfranzmvm@gmail.com";
    //envio de email
    const ENVIRONMENT=0;
    const x_size=80;
    const y_size=150;
?>