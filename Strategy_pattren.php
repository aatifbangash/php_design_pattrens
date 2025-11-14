<?php
// Strategy pattren
interface PaymentStrategy {
    public function pay();
}

class PaypalMethod implements PaymentStrategy {
    public function pay() { return 'Paying with Paypal'; }
}

class StripeMethod implements PaymentStrategy {
    public function pay() { return 'Paying with Stripe'; }
}
class Checkout
{
	public $paymentMethod;
	public function __construct(PaymentStrategy $paymentMethod)
	{
		$this->paymentMethod = $paymentMethod;
	}

	public function payTotal()
	{
		return $this->paymentMethod->pay();
	}
}

$Checkout = new Checkout(new PaypalMethod());
echo $Checkout->payTotal();

$Checkout = new Checkout(new StripeMethod());
echo $Checkout->payTotal();

