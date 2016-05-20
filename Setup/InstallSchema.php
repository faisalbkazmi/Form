<?php
namespace Excellence\Hello\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
      $table = $installer->getConnection()->newTable(
            $installer->getTable('excellence_hello_test')
    )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Entity ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Demo Name'
        )->addColumn(
            'message',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Demo Message'
            )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Demo Email'
            );
$installer->getConnection()->createTable($table);
$installer->endSetup();
    }
}
