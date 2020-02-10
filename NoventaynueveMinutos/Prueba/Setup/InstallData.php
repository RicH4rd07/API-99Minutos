<?php
/**
 * 99Minutos
 *
 * @category   99Minutos
 * @package    99Minutos_API
 * @author     99Lineas
 * @copyright  Copyright (c) 2020 
 */


namespace NoventaynueveMinutos\Prueba\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
$URL_Produccion =  	'https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/';
$URL_Sandbox = 'https://deploy-dot-precise-line-76299minutos.appspot.com/api/v1/' ;

class InstallData implements InstallDataInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        
    }
}
