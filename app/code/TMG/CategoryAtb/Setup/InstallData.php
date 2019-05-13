<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/03/2019
 * Time: 12:05
 */

namespace TMG\CategoryAtb\Setup;

use Magento\Catalog\Model\Category;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
    private $_attribute;
    private $_config;

    public function __construct(EavSetupFactory $eavSetupFactory,Config $config,\Magento\Customer\Model\ResourceModel\Attribute $attribute)
    {
        $this->_attribute = $attribute;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->_config = $config;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            Category::ENTITY,
            'new_category_attribute',
            [
                'type'         => 'varchar',
				'label'        => 'New Category Attribute',
                'input'        => 'text',
                'sort_order'   => 100,
                'source'       => '',
                'global'       => 1,
                'visible'      => true,
                'required'     => false,
                'user_defined' => false,
                'default'      => null,
                'group'        => '',
                'backend'      => ''
            ]
        );
    }
}