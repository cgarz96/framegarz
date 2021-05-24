<?php 
	namespace App\Controller;
	require_once ROOT . '/config/database.php';
	use Illuminate\Database\Capsule\Manager as Eloquent;
	use App\Models\Usuario;
	use Jenssegers\Blade\Blade;


	/**
	 * 
	 */
	class UsuarioController 
	{
		
	 public function index($value='')
	 {
	 	$blade = new Blade('../views', 'cache');

	 	return $blade->make('welcome', ['framework'=>'FrameGarz'])->render();
	 }
	 public function parametros($id)
	 {
	 	$blade = new Blade('../views', 'cache');

	 	//$usuarios=Usuario::get();
	 	$usuarios = Eloquent::table('usuarios')->where('id',$id)->get();
	 	//$usuarios=Usuario::select('nombre')->get();
	 	$data= compact('usuarios');

	 	return $blade->make('list', $data)->render();
	 }


	}
