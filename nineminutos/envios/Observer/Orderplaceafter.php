<?php

 namespace nineminutos\envios\Observer;
 
 use Magento\Framework\Event\ObserverInterface;
 use Psr\Log\LoggerInterface;
 
 class Orderplaceafter implements ObserverInterface
 {
     protected $logger;
 
     public function __construct(LoggerInterface$logger) {

         $this->logger = $logger;
         
     }
 
     public function execute(\Magento\Framework\Event\Observer $observer){
          try {

              $order = $observer->getEvent()->getOrder(); 
            }

           catch(\Exception $e){
              $this->logger->info($e->getMessage());
          }

          

          $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://deploy-dot-precise-line-76299minutos.appspot.com/api/v1/autorization/order");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"apikey\": \"bdb34292bb1666be2235c9a903450b7837cfb156\",
  \"deliveryType\": \"sameDay\",
  \"packageSize\": \"m\",
  \"notes\": \"\",
  \"cahsOnDelivery\": true,
  \"amountCash\": 30,
  \"SecurePackage\": false,
  \"amountSecure\": 0,
  \"receivedId\": \"\",
  \"origin\": {
    \"sender\": \"{$order->getShippingAddress()->getData('firstname')}\",
    \"nameSender\": \"{$order->getShippingAddress()->getData('firstname')}\",
    \"lastNameSender\": \"Lopez\",
    \"emailSender\": \"fernando@99minutos.com\",
    \"phoneSender\": \"5518765128\",
    \"addressOrigin\": \"merida 238 cmd , 06700\",
    \"numberOrigin\": \"40\",
    \"codePostalOrigin\": \"06700\",
    \"country\": \"MEX\"
  },
  \"destination\": {
    \"receiver\": \"{$order->getShippingAddress()->getData('firstname')} . {$order->getShippingAddress()->getData('lastname')}\",
    \"nameReceiver\": \"{$order->getShippingAddress()->getData('firstname')}\",
    \"lastNameReceiver\": \"{$order->getShippingAddress()->getData('lastname')}\",
    \"emailReceiver\": \"{$order->getShippingAddress()->getData('email')}\",
    \"phoneReceiver\": \"{$order->getShippingAddress()->getData('telephone')}\",
    \"addressDestination\": \"{$order->getShippingAddress()->getData('street')} . {$order->getShippingAddress()->getData('city')} . {$order->getShippingAddress()->getData('postcode')}\",
    \"numberDestination\": \"238\",
    \"codePostalDestination\": \"{$order->getShippingAddress()->getData('postcode')}\",
    \"country\": \"MEX\"
  }
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));

$response = curl_exec($ch);
curl_close($ch);
      }
}