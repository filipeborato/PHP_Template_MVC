<?php
	
ini_set('display_errores', 'on');
error_reporting(E_ALL);


class MyAutoload
{
	public static function start()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));

		$root = $_SERVER['DOCUMENT_ROOT'];
		$host = $_SERVER['HTTP_HOST'];

		define('HOST', 'https://'.$host.'/JF_Blog/');
		define('ROOT', $root.'Projet_4/');

		define('CONTROLLER', ROOT.'controller/');
		define('MODEL', ROOT.'model/');
		define('VIEW', ROOT.'view/');
		define('CLASSES', ROOT.'classes/');

		define('PUBLIC', HOST.'public/');
	}

	public  static function autoload($class)
	{
		if(file_exists(MODEL.$class.'.php'))
		{
			include_once(MODEL.$class.'.php');
		} else if(file_exists(CLASSES.$class.'.php'))
		{
			include_once(CLASSES.$class.'.php');
		} else if(file_exists(CONTROLLER.$class.'.php'))
		{
			include_once(CONTROLLER.$class.'.php');
		};
	}
}

