<?php

namespace test;

use ErgonTech\MageTest\LayoutHelpers;

class ergontech_exampleTest extends \PHPUnit_Framework_TestCase
{
    use LayoutHelpers;

    /**
     * @var \Varien_Simplexml_Config
     */
    private $layout;

    protected function setUp()
    {
        $filename = __DIR__ . '/../../../../../../../app/design/frontend/base/default/layout/ergontech_example.xml';
        $this->layout = new \Varien_Simplexml_Config($filename);
    }

    public function testExampleBlockAddedToRootInDefault()
    {
        $xpath = 'default/reference[@name="root"]/block[@name="ergontech.example"]';
        static::assertXpathHasResults($this->layout->getNode(), $xpath);
        $node = current($this->layout->getXpath($xpath));

        static::assertEquals('core/template', $node->getAttribute('type'));
        static::assertEquals('example.phtml', $node->getAttribute('template'));
    }

    public function testActionCallOnRootInDefault()
    {
        $xpath = 'default/reference[@name="root"]';
        static::assertXpathHasResults($this->layout->getNode(), $xpath);

        $node = current($this->layout->getXpath($xpath));

        static::assertActionIsCalledOnNode($node, 'setTemplate', ['page/example.phtml']);
    }

}