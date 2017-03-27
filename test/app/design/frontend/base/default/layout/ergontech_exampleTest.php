<?php

namespace test;

use ErgonTech\MageTest\LayoutHelpers;

/**
 * @link https://en.wikipedia.org/wiki/XPath
 * @see LayoutHelpers
 *
 * Layout testing using the LayoutHelpers trait relies heavily on xpath.
 * It provides the following assertions:
 *   - assertXpathHasResults
 *   - assertActionIsCalledOnNode
 *   - assertHandleUpdatesHandle
 */
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

    /**
     * In this test we're asserting that the block "example" is added to the layout as expected:
     *  - It's nested in the "root" reference of the default handle
     *  - It has the proper name, type, and template
     */
    public function testExampleBlockAddedToRootInDefault()
    {
        $xpath = 'default/reference[@name="root"]/block[@name="ergontech.example"]';
        static::assertXpathHasResults($this->layout->getNode(), $xpath);
        $node = current($this->layout->getXpath($xpath));

        static::assertEquals('core/template', $node->getAttribute('type'));
        static::assertEquals('example.phtml', $node->getAttribute('template'));
    }

    /**
     * In this test, we assert there's a root block reference in the default handle
     * And that setTemplate is called with the right argument
     */
    public function testActionCallOnRootInDefault()
    {
        $xpath = 'default/reference[@name="root"]';
        static::assertXpathHasResults($this->layout->getNode(), $xpath);

        $node = current($this->layout->getXpath($xpath));

        static::assertActionIsCalledOnNode($node, 'setTemplate', ['page/example.phtml']);
    }

}