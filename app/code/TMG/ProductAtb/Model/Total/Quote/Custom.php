<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 29/03/2019
 * Time: 11:33
 */

namespace TMG\ProductAtb\Model\Total\Quote;


use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Quote\Model\Quote\Address\Total\AbstractTotal;

class Custom extends AbstractTotal
{
    protected $_priceCurrency;

    public function __construct(PriceCurrencyInterface $priceCurrency)
    {
        $this->_priceCurrency = $priceCurrency;
    }

    public function collect(\Magento\Quote\Model\Quote $quote,
                            \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
                            \Magento\Quote\Model\Quote\Address\Total $total)
    {
        parent::collect($quote, $shippingAssignment, $total);
        $baseDiscount = 10;
        $discount =  $this->_priceCurrency->convert($baseDiscount);
        $total->addTotalAmount('customdiscount', -$discount);
        $total->addBaseTotalAmount('customdiscount', -$baseDiscount);
        $total->setBaseGrandTotal($total->getBaseGrandTotal() - $baseDiscount);
        $quote->setCustomDiscount(-$discount);
        return $this;
    }
}