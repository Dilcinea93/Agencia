<?php 
namespace App\Classes;


class text {
public $texts=[];
public $textos=[
			"En nuestro sistema podrás ser proveedor de loterías e incluso crear tu propio evento de rifa si en algún momento quieres generar ingresos extra bajo esta modalidad. ",
			"Tenemos asociación con agencias especializadas en las loterías más populares, para facilitar tu adquisición del ticket de lotería así como permisos y asociaciones para ser gestor de ventas de estos juegos",
			"Tenemos una serie de rifas programadas por nuestros colaboradores con costos muy accesibles por ticket, con un sistema de pago confiable, seguro y practico. Te invitamos a revisar nuestra lista de eventos y unirte a algún evento que te interese. Ve a nuestro listado en el menú de arriba",
			"En nuestra sección Sobre nosotros, puedes conocer más sobre nuestro oficio, nuestras credenciales y puntos de contacto por si deseas hacer algún comentario sobre nuestro sistema. Nos ayudaría mucho"
		];
	public function __construct(){
		$this->defineNew($this->textos);
	}

	public function defineNew($textos){
		foreach($textos as $text){
			array_push($this->texts,$text);
		}
	}
	public function getTexts(){
		return $this->texts;
	}

}
?>