<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 30/03/2019
 * Time: 14:28
 */

namespace TMG\ProductAtb\Model\Plugin\Quote;


use Magento\Quote\Model\Quote\Item\ToOrderItem;

class ProductToOrderItem extends ToOrderItem
{
    public function aroundConvert(
        \Magento\Quote\Model\Quote\Item\ToOrderItem $subject,
        \Closure $proceed,
        \Magento\Quote\Model\Quote\Item\AbstractItem $item,
        $additional = []
    ) {
        /** @var $orderItem Item */
        $orderItem = $proceed($item, $additional);
        $orderItem->setProductCustomData($item->getProductCustomData());
        return $orderItem;
    }
}