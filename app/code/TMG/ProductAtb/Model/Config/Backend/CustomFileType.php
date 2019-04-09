<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 28/03/2019
 * Time: 11:15
 */

namespace TMG\ProductAtb\Model\Config\Backend;


use Magento\Config\Model\Config\Backend\File;

class CustomFileType extends File
{
    public function _getAllowedExtensions()
    {
        return ['csv', 'xls'];
    }
}