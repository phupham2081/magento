<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 12/03/2019
 * Time: 13:46
 */

namespace M2\Schema\Setup;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('new_data_table');
        if ($conn->isTableExists($tableName) != true){
            $table=$conn->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ])
                ->addColumn(
                    'title',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ])
                ->addColumn(
                    'content',
                    Table::TYPE_TEXT,
                    '2M',
                    [
                        'nullable' => false,
                        'default' => ''
                    ]
                )
                ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}