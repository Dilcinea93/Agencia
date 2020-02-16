<?php 
namespace App\Classes;

use Barryvdh\DomPDF\Facade as PDF;
use App\numsModel;
use App\client;
use DB;

class generarPDF {


	/*Arreglar DDF*/
	public function createPDF($numero){
		$pdf = PDF::loadView('ticket', compact('numero'));
    return $pdf->download('ticket.pdf');
	}
	public function write(){
		//$this->createPDF();
		return true;
	}
}
?>