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

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        if (version_compare($context->getVersion(), "1.0.0", "<")) {
            
        }
    }
}
