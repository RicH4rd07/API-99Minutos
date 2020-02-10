
<?php
/**
 * 99Minutos
 *
 * @category   99Minutos
 * @package    99Minutos_API
 * @author     99Lineas
 * @copyright  Copyright (c) 2020 
 */

namespace \Observer\Checkout;

class SubmitAllAfter implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
        ) 
    {

        $ShippingAddress = $observer->getShippingAddress();
        $nameReceiver= $ShippingAddress->getName();
        $lastNameReciver= $ShippingAddress->getlastName();
        $emailReceiver=$ShippingAddress->getemail();
        $phoneReceiver=$ShippingAddress->getphone();
        $addressDestination=$ShippingAddress->getaddress();
        #$numberDestination=;
        $codePostalDestination->getcodepostaldest();
        $country='MEX';
        

        $apikey='dc60c3dc45a9b365a53d93b49a42c823bb33970a';
        /*$deliveryType=; 
        $packageSize=; 
        $notes=; 
        $cahsOnDelivery=;
        $amountCash=;
        $SecurePackage=;
        $amountSecure=; 
        $receivedId=;
        // Datos de origen 
        $sender=;
        $nameSender=;
        $lastNameSender=;
        $emailSender=;
        $phoneSender
        $addressOrigin=;
        $numberOrigin=;
        $codePostalOrigin=;
        $country=;
        #echo $Name ;
        $receiver=;
        */
        
      
    }

}
