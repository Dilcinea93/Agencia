
+

1?php

namespace App\Classes\Services;

use App\Classes\Payment;
use App\Interfaces\paymentInterface;

class PaymentService implements paymentInterface{
	private $paymentdata;
	public function __construct(array $paymentdata){
		$this->paymentdata=$paymentdata;
		$this->validate($paymentdata);
	}
	public function getPaymentData(){
		return $this->paymentdata;
	}
	public function validate($paymentdata){
		//dd($paymentdata);
	}
	public function payment(){
		//como se hace un pago por internet? no se... vincular a la plataforma de pago... ni idea
		return "PAYMENT";
	}
}
?>
	