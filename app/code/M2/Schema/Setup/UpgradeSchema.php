<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 12/03/2019
 * Time: 13:46
 */

namespace M2\Schema\Setup;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
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
        } else {
            $setup->run("ALTER TABLE ".$tableName." ADD COLUMN status BOOLEAN, ADD sort_order SMALLINT");
        }
        $setup->endSetup();
    }
}