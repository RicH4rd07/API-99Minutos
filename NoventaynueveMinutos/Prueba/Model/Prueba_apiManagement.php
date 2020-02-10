<?php
/**
 * 99Minutos
 *
 * @category   99Minutos
 * @package    99Minutos_API
 * @author     99Lineas
 * @copyright  Copyright (c) 2020 
 */     



namespace NoventaynueveMinutos\Prueba\Model;
    $URL_Produccion =  	'https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/';
    $URL_Sandbox = 'https://deploy-dot-precise-line-76299minutos.appspot.com/api/v1/' ;


class Prueba_apiManagement implements \NoventaynueveMinutos\Prueba\Api\Prueba_apiManagementInterface

{
    public function tomval(){
        
        #fucnion que se encarga de hacer la conexion 
        $objectmanager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        #$connection = $resource->getConnection();
        $day = date(Y,m,d);
        $miArray = array(
            $nameReceiver
            $lastNameReciver
            $emailReceiver
            $phoneReceiver
            $addressDestination
            $codePostalDestination
            $country

        );
        # $miArray();
        /*$DeliveryType=	$_POST['DeliveryType'];
        $Address=		$_POST['Address'];
        $Province=	$_POST['Province'];
        $City=	$_POST['City'];
        $PostalCode= $_POST['PostalCode'];
        $Email=	$_POST['Email'];
    
        $Phone=	$_POST['Phone'];
        $FirstName=	$_POST['FirstName'];
        $LastName=	$_POST['LastName'];
        $PaymentMethod=	$_POST['PaymentMethod'];
        $Amount=	$_POST['Amount'];*/
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$URL_Sandbox);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS,"{$miArray}");
        $response = curl_exec($ch);
        curl_close($ch);
        


       /* $Order=	$_POST['']
        $nota=      
*/
    }

    /*
      {@inheritdoc}
     
    public function getPrueba_api($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
    */
}
