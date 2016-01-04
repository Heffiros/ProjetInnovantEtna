<?php 
error_reporting(-1);
require __DIR__ . '/vendor/autoload.php';
/**
 * ______   ____      _   _  ____ ________    ___________________________
 * |  __ \ / __ \    | \ | |/ __ \__   __|   |  ____|  __ \_   _|__   __|
 * | |  | | |  | |   |  \| | |  | | | |      | |__  | |  | || |    | |   
 * | |  | | |  | |   | . ` | |  | | | |      |  __| | |  | || |    | |   
 * | |__| | |__| |   | |\  | |__| | | |      | |____| |__| || |_   | |   
 * |_____/ \____/    |_| \_|\____/  |_|      |______|_____/_____|  |_|    
 *
 *  _______ _    _ _____  _____     ______ _____ _      ______ 
 * |__   __| |  | |_   _|/ ____|   |  ____|_   _| |    |  ____|
 *    | |  | |__| | | | | (___     | |__    | | | |    | |__   
 *    | |  |  __  | | |  \___ \    |  __|   | | | |    |  __|  
 *    | |  | |  | |_| |_ ____) |   | |     _| |_| |____| |____ 
 *    |_|  |_|  |_|_____|_____/    |_|    |_____|______|______|
 *
 * ------------------------------------------------------------------------
 * The only files you need to modify are :
 *  - app/ (as a whole)
 *  - db_config.php (if needed)
 *  - routes.php
 */
spl_autoload_register(function ($class)
{
    foreach (array('app', 'lib') as $prefix)
	    if (file_exists($path = $prefix . '/' . str_replace('\\', '/', $class) . '.php'))
		    return require $path;
});
function array_extract($array, array $cols)
{
	$vals = array();
	foreach ($cols as $col)
		$vals[$col] = $array[$col];
	return $vals;
}
define('BASEPATH', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/');
define('BASEURL', BASEPATH . 'index.php/');
try {
	session_start();
	$routes = require 'routes.php';
	$router = new Minima\Dispatcher($routes);
	if (file_exists('db_config.php') && is_array($db_config = include 'db_config.php')) {
		$db = new PDO('mysql:host=' . $db_config['host'] . ';port=3306;dbname=' . $db_config['dbname'],
			$db_config['user'], $db_config['pass'],
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		PotterORM\Base::setDb($db);
		$router->setVariables(array(
			'db' => $db,
			'session' => new UserSession($db),
		));
	}
	$router->dispatch();
} catch (Exception $e) {
	var_dump($e->getMessage(), $e->getTraceAsString());
}
?>