<?php


namespace Thienminh\Training\Plugin;


class ExamplePlugin
{
    public function beforeSetTitle(\Thienminh\Training\Controller\Index\Example $example, $title)
    {
        echo "</br>" . "end before" . "</br>";
        $title = $title . "like";
        echo __METHOD__ . "</br>";

        return [$title];
    }

    public function afterGetTitle(\Thienminh\Training\Controller\Index\Example $example, $result)
    {
        echo "</br>" . "start After" . "</br>";
        echo __METHOD__ . "</br>";

        return '<h1>' . $result . 'Gon' . '</h1>';
    }

    public function aroundGetTitle(\Thienminh\Training\Controller\Index\Example $example, callable $proceed)
    {
        echo "</br>" . "start Around" . "</br>";
        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";
        echo "</br>" . "end Around" . "</br>";
        return $result;
    }
}
