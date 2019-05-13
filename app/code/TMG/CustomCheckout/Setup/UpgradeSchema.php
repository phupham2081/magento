<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 25/04/2019
 * Time: 10:35
 */

namespace TMG\CustomCheckout\Setup;


use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(),'1.0.1','<=')){
            /*
             * Create Province table
             */
            $tableName = $setup->getTable('province');
            if ($setup->getConnection()->isTableExists($tableName) != true){
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('province'))
                    ->addColumn(
                        'province_id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Province ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable' => false, 'default' => ''],
                        'Name'
                    )->setComment("Province table");
                $setup->getConnection()->createTable($table);
            }

            /*
             * Create District table
             */
            $tableName = $setup->getTable('district');
            if ($setup->getConnection()->isTableExists($tableName) != true) {
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('district'))
                    ->addColumn(
                        'district_id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'District ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable' => false, 'default' => ''],
                        'Name'
                    )->addColumn(
                        'province_id',
                        Table::TYPE_INTEGER,
                        null,
                        ['unsigned' => true, 'nullable' => false]
                    )->addForeignKey(
                        $setup->getFkName('district','province_id','province','province_id'),
                        'province_id',
                        $setup->getTable('province'),
                        'province_id',
                        Table::ACTION_CASCADE
                    )->setComment("District table");
                $setup->getConnection()->createTable($table);
            }

            /*
             * Create Commune table
             */
            $tableName = $setup->getTable('commune');
            if ($setup->getConnection()->isTableExists($tableName) != true) {
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('commune'))
                    ->addColumn(
                        'commune_id',
                        Table::TYPE_INTEGER,
                        null,
                        ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                        'Commune ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable' => false, 'default' => ''],
                        'Name'
                    )->addColumn(
                        'district_id',
                        Table::TYPE_INTEGER,
                        null,
                        ['unsigned' => true, 'nullable' => false]
                    )->addForeignKey(
                        $setup->getFkName('commune','district_id','district','district_id'),
                        'district_id',
                        $setup->getTable('district'),
                        'district_id',
                        Table::ACTION_CASCADE
                    )->setComment("Commune table");
                $setup->getConnection()->createTable($table);
            }
        }
        $setup->endSetup();
    }
}