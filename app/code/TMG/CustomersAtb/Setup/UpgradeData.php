<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 18/04/2019
 * Time: 09:18
 */

namespace TMG\CustomersAtb\Setup;

use Magento\Customer\Model\Customer;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $eavSetupFactory;

    private $eavConfig;

    private $attributeResource;

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Customer\Model\ResourceModel\Attribute $attributeResource
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if ( version_compare($context->getVersion(), '1.0.1', '<' )) {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->addAttribute(Customer::ENTITY, 'new_attribute', [
                'type' => 'varchar',
                'label' => 'New Attribute',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'position' =>999,
                'system' => 0,
            ]);

            $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'new_attribute');
            $attribute->setData('used_in_forms', ['adminhtml_customer']);
            $this->attributeResource->save($attribute);
        }
    }
}