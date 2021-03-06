<?php


namespace Tareghnazari\Payment\Contracts;


interface PaymentContract
{
    public function request($amount,$CallbackURL);
    public function verify($amount);
    public function redirect($invoiceId);
}
