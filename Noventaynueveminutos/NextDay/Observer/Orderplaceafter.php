<?php

 namespace Noventaynueveminutos\NextDay\Observer;
 
 use Magento\Framework\Event\ObserverInterface;
 use Psr\Log\LoggerInterface;
 
 class Orderplaceafter implements ObserverInterface
 {
     protected $logger;

     protected $_scopeConfig;

     protected $_customerSession;

     protected $_checkoutSession;
 
     public function __construct(
       LoggerInterface$logger, 
       \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
       \Magento\Customer\Model\Session $session,
       \Magento\Checkout\Model\Session $checkoutSession) 
     {
         $this->logger = $logger;
         $this->_scopeConfig = $scopeConfig;
	       $this->_customerSession = $session;
	       $this->_checkoutSession = $checkoutSession;
     }
 
     public function execute(\Magento\Framework\Event\Observer $observer){

          $carrier =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/title', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $apikey =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/apikey', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $packageSize =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/packageSize', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $notes =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/notes', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $name =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/seller_name', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $lastname =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/lastname', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $emailSender =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/emailSender', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $phoneSender =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/phoneSender', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $addressOrigin =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/addressOrigin', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $numberOrigin =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/numberOrigin', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $codePostalOrigin =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/codePostalOrigin', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
  
          $SecurePackage =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/SecurePackage', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
          
          $cahsOnDelivery =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/cahsOnDelivery', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $ShippingPrice =  $this->_scopeConfig->getValue('carriers/Noventaynueveminutos_NextDay/price', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

          $this->_checkoutSession->start();

          $_weight = $this->_checkoutSession->getWeight();

          $_Total = $this->_checkoutSession->getTotal();

          $amountCash;

          $amountSecure;

          $Secure;

          $Cash;

          if($SecurePackage==='1')
          {
            $Secure = 'true';
          } else
          {
            $Secure = 'false';
          }

          if($cahsOnDelivery==='1')
          {
            $Cash = 'true';
          } else
          {
            $Cash = 'false';
          }

          if($Secure===true)
          {
            $amountSecure = $_Total;
          } else
          {
            $amountSecure = 0;
          }

          if($Cash===true)
          {
            $amountCash = $_Total + $ShippingPrice;
          } else
          {
            $amountCash = 0;
          }

          try 
            {

              $order = $observer->getEvent()->getOrder(); 
            }

           catch(\Exception $e)
            {
              $this->logger->info($e->getMessage());
            }

            
            

            $shippingMethod = $order->getShippingMethod();

            if($shippingMethod ==='Noventaynueveminutos_NextDay_Noventaynueveminutos_NextDay')
            {
              $shippingMethod1 = 'Noventaynueveminutos_NextDay_Noventaynueveminutos_NextDay';
              $deliveryType = 'NextDay';
            }elseif ($shippingMethod ==='Noventaynueveminutos_SameDay_Noventaynueveminutos_SameDay')
            {
              $shippingMethod1 = 'Noventaynueveminutos_SameDay_Noventaynueveminutos_SameDay';
              $deliveryType = 'SameDay';
            }elseif ($shippingMethod ==='Noventaynueveminutos_CO2free_Noventaynueveminutos_CO2free')
            {
              $shippingMethod1 = 'Noventaynueveminutos_CO2free_Noventaynueveminutos_CO2free';
              $deliveryType = 'CO2';
            }elseif ($shippingMethod ==='Noventaynueveminutos_Noventaynueveminutos_Noventaynueveminutos_Noventaynueveminutos')
            {
              $shippingMethod1 = 'Noventaynueveminutos_Noventaynueveminutos_Noventaynueveminutos_Noventaynueveminutos';
              $deliveryType = '99minutos';
            }else{
              $shippingMethod1 = '...';
            }
      
      

  if($this->_customerSession->isLoggedIn())
  {
            $customer = $this->_customerSession->getCustomer();	

            $shippingAddress = $customer->getDefaultShippingAddress();

            $customerFirstName = $shippingAddress->getFirstname();
            
            $customerLastname = $shippingAddress->getLastname();

            $customerEmail = $customer->getEmail();
            
            $customerTelephone = $shippingAddress->getTelephone();

            $customerPostCode = $order->getShippingAddress()->getData('postcode');

            $customerCity = $order->getShippingAddress()->getData('city');
            
            $customerStreet = $order->getShippingAddress()->getData('street');


        if($shippingMethod === $shippingMethod1) 
          {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://becarios-dot-precise-line-76299minutos.appspot.com/api/v1/autorization/order");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
  
            curl_setopt($ch, CURLOPT_POST, TRUE);
  
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
              \"apikey\": \"{$apikey}\",
              \"deliveryType\": \"{$deliveryType}\",
              \"packageSize\": \"{$_weight}\",
              \"notes\": \"{$notes}\",
              \"cahsOnDelivery\": {$Cash},
              \"amountCash\": {$amountCash},
              \"SecurePackage\": {$Secure},
              \"amountSecure\": {$amountSecure},
              \"receivedId\": \"\",
              \"origin\": {
                \"sender\": \"{$name}\",
                \"nameSender\": \"{$name}\",
                \"lastNameSender\": \"{$lastname}\",
                \"emailSender\": \"{$emailSender}\",
                \"phoneSender\": \"{$phoneSender}\",
                \"addressOrigin\": \"{$addressOrigin}\",
                \"numberOrigin\": \"{$numberOrigin}\",
                \"codePostalOrigin\": \"{$codePostalOrigin}\",
                \"country\": \"MEX\"
              },
              \"destination\": {
                \"receiver\": \"{$customerFirstName} . {$customerLastname} \",
                \"nameReceiver\": \"{$customerFirstName}\",
                \"lastNameReceiver\": \"{$customerLastname}\",
                \"emailReceiver\": \"{$customerEmail}\",
                \"phoneReceiver\": \"{$customerTelephone}\",
                \"addressDestination\": \"{$customerStreet}, {$customerCity}\",
                \"numberDestination\": \" \",
                \"codePostalDestination\": \"{$customerPostCode}\",
                \"country\": \"MEX\"
              }
            }");
  
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Content-Type: application/json"
            ));
  
            $response = curl_exec($ch);
            curl_close($ch);

            $jsonResponse = json_decode($response, true);

            $message = $jsonResponse['message'][0]['message'];

            $trackingId = $jsonResponse['message'][0]['reason']['trackingid'];

            $counter = $jsonResponse['message'][0]['reason']['counter'];
            
            $orderId = $order->getId();

            $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');

            $connection= $this->_resources->getConnection();

            $themeTable = $this->_resources->getTableName('noventaynueve_minutos');

            $sql = "INSERT INTO " . $themeTable . "(order_id, status, reason, tracking_id, counter) VALUES ('$orderId', '$message', '$message', '$trackingId', '$counter')";

            $connection->query($sql);

                  
            } else
              {
               $shippingMethod;
              }

      } // CIERRE IF CUSTOMER
       
     else
     {
          if($shippingMethod === $shippingMethod1) 
          {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://becarios-dot-precise-line-76299minutos.appspot.com/api/v1/autorization/order");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
  
            curl_setopt($ch, CURLOPT_POST, TRUE);
  
            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
              \"apikey\": \"{$apikey}\",
              \"deliveryType\": \"{$deliveryType}\",
              \"packageSize\": \"{$_weight}\",
              \"notes\": \"{$notes}\",
              \"cahsOnDelivery\": {$Cash},
              \"amountCash\": {$amountCash},
              \"SecurePackage\": {$SecurePackage},
              \"amountSecure\": {$amountSecure},
              \"receivedId\": \"\",
              \"origin\": {
                \"sender\": \"{$name}\",
                \"nameSender\": \"{$name}\",
                \"lastNameSender\": \"{$lastname}\",
                \"emailSender\": \"{$emailSender}\",
                \"phoneSender\": \"{$phoneSender}\",
                \"addressOrigin\": \"{$addressOrigin}\",
                \"numberOrigin\": \"{$numberOrigin}\",
                \"codePostalOrigin\": \"{$codePostalOrigin}\",
                \"country\": \"MEX\"
              },
              \"destination\": {
                \"receiver\": \"{$order->getShippingAddress()->getData('firstname')} . {$order->getShippingAddress()->getData('lastname')}\",
                \"nameReceiver\": \"{$order->getShippingAddress()->getData('firstname')}\",
                \"lastNameReceiver\": \"{$order->getShippingAddress()->getData('lastname')}\",
                \"emailReceiver\": \"{$order->getShippingAddress()->getData('email')}\",
                \"phoneReceiver\": \"{$order->getShippingAddress()->getData('telephone')}\",
                \"addressDestination\": \"{$order->getShippingAddress()->getData('street')} . {$order->getShippingAddress()->getData('city')} . {$order->getShippingAddress()->getData('postcode')}\",
                \"numberDestination\": \" \",
                \"codePostalDestination\": \"{$order->getShippingAddress()->getData('postcode')}\",
                \"country\": \"MEX\"
              }
            }");
  
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Content-Type: application/json"
            ));
  
            $response = curl_exec($ch);
            curl_close($ch);

            $jsonResponse = json_decode($response, true);

            $message = $jsonResponse['message'][0]['message'];

            $trackingId = $jsonResponse['message'][0]['reason']['trackingid'];
            
            $counter = $jsonResponse['message'][0]['reason']['counter'];
            
            $orderId = $order->getId();

            $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');

            $connection= $this->_resources->getConnection();

            $themeTable = $this->_resources->getTableName('noventaynueve_minutos');

            $sql = "INSERT INTO " . $themeTable . "(order_id, status, reason, tracking_id, counter) VALUES ('$orderId', '$message', '$message', '$trackingId', '$counter')";

            $connection->query($sql);

                   
            } else{
              $shippingMethod;
            }

        } //CIERRE ELSE CUSTOMER

      } //CIERRE FUNCIÓN OBSERVADOR

    } //CIERRE CLASE 

           

          