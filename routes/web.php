<?php
define("ROOT",$_SERVER['DOCUMENT_ROOT'].'/framegarz');

require ROOT . '/vendor/autoload.php'; #Cargar todas las dependencias

require ROOT . '/config/autoload.php'; #Cargar las clases de manera dinamica
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;

$router = new RouteCollector();

$router->get("/", function(){
	return "Esta es la raíz";
});

$router->get("/venta/{id}", function($id){
	return "Obtener la venta con el id $id";
});

$router->get("/ventas/{dia}/{mes}/{anio}", function($dia, $mes, $anio){
	return "Obtener las ventas del día $dia, mes $mes y año $anio";
});

$router->get("/ventas/eliminadas/{dia}/{mes}/{anio}/", function($dia, $mes, $anio){
	return "Obtener las ventas ELIMINADAS del día $dia, mes $mes y año $anio";
});

$router->get("/esta/es/una/ruta/larga/{valor1}/bla/{otro_valor}/bla", function($valor1, $valor2){
	return "Ruta muy larga, valor1 es $valor1 y valor 2 es $valor2";
});

$router->get('/usuarios', ['App\Controller\UsuarioController', 'index']);

$router->get('/usuario/{id}', ['App\Controller\UsuarioController', 'parametros']);




$despachador = new Dispatcher($router->getData());
$rutaCompleta = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER['REQUEST_METHOD'];
$rutaLimpia = processInput($rutaCompleta);

try {
    echo $despachador->dispatch($metodo, $rutaLimpia); # Mandar sólo el método y la ruta limpia
} catch (HttpRouteNotFoundException $e) {
    echo "Error: Ruta no encontrada";
} catch (HttpMethodNotAllowedException $e) {
    echo "Error: Ruta encontrada pero método no permitido";
}



/**
 * Gracias a https://www.sitepoint.com/fast-php-routing-phroute/
 */

function processInput($uri)
{
    return implode('/',
        array_slice(
            explode('/', $uri), 3));
}
?>