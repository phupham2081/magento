<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/03/2019
 * Time: 12:05
 */

namespace TMG\CustomerAtb\Setup;


use Magento\Customer\Model\Customer;
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
            \Magento\Customer\Model\Customer::ENTITY,
            'tesst_attribute',
            [
                'type'         => 'varchar',
				'label'        => 'Sample Attribute',
				'input'        => 'text',
				'required'     => false,
				'visible'      => true,
				'user_defined' => true,
				'position'     => 999,
				'system'       => 0
            ]
        );
        $testAttribute = $this->_config->getAttribute(Customer::ENTITY, 'tesst_attribute');
        $testAttribute->setData('used_in_forms', ['adminhtml_customer']);
        $this->_attribute->save($testAttribute);
    }
}