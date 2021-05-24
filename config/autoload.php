<?php 
	/**
	 * Funcion que monta las clases que se instancian
	 */

	function autoload($class)
	{
		//echo $class."<br>";
		if ($class=='Doctrine\DBAL\Driver\PDOConnection') {

		}else{
			$url="../".str_replace("\\", "/", $class.".php");
			//echo $url."<br>";

			require_once ($url);
		}
	}
	spl_autoload_register('autoload');
?>