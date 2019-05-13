<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 23/03/2019
 * Time: 11:07
 */

namespace M2\Staff\Plugin;


class ExamplePlugin
{
    public function beforeSetTitle(\M2\Staff\Controller\Index\Example $example, $title)
    {
        $title = $title . " to ";
        echo __METHOD__ . "</br>";

        return [$title];
    }
}