<?php

namespace Noventaynueveminutos\NextDay\Observer;

use Magento\Framework\Event\ObserverInterface;


class Quoteinit implements ObserverInterface
{
protected $_checkoutSession;
public function __construct(
	
	\Magento\Checkout\Model\Session $checkoutSession)
	{
	
	$this->_checkoutSession = $checkoutSession;
    }
    public function execute (\Magento\Framework\Event\Observer $observer)
    {
        $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://becarios-dot-precise-line-76299minutos.appspot.com/api/v1/cat/coveage");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"coverage\": \"57000\"}");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json", "Authorization:Bearer bdb34292bb1666be2235c9a903450b7837cfb156"
));

$response = curl_exec($ch);
curl_close($ch);


    }
}