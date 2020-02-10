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

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        if (version_compare($context->getVersion(), "1.0.0", "<")) {
            
        }
    }
}
