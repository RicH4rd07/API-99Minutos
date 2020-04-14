<?php

namespace Noventaynueveminutos\NextDay\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
          * Create table 'oscar_prueba'
          */
          $table = $setup->getConnection()
              ->newTable($setup->getTable('noventaynueve_minutos'))
              ->addColumn(
                  'noventaynueveminutos_id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                  null,
                  ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                  'PRIMARY ID'
              )
              ->addColumn(
                'order_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => false, 'nullable' => false],
                'ORDER ID'
              )
              ->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['identity' => false, 'nullable' => false],
                'STATUS'
              )
              ->addColumn(
                'reason',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['identity' => false, 'nullable' => false, 'default' => ''],
                'REASON'
              )
              ->addColumn(
                  'tracking_id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                    'TRACKING ID'
              )->addColumn(
                'counter',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['identity' => false, 'unsigned' => true, 'nullable' => false],
                'CLIENT ID'
              )->setComment("Greeting Message table");
          $setup->getConnection()->createTable($table);
      }
}
