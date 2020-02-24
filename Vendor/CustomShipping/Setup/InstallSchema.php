<?php
/**
* Derechos reservados 99 Minutos 
*/

namespace Vendor\CustomShipping\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          
          $table = $setup->getConnection()
              ->newTable($setup->getTable('99minutos_data'))
              ->addColumn(
                  'greeting_id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                  null,
                  ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                  'Greeting ID'
              )
              /*->addColumn(
                  'nombre',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                    'Nombre'
              )->setComment("Greeting Message table")
              */

              ->addColumn(
                'message',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false, 'default' => ''],
                  'Message'
            )->setComment("Greeting Message table");
          $setup->getConnection()->createTable($table);
      }
}
