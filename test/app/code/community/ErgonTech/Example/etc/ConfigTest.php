<?php

namespace test;

class ErgonTech_Example_etc_ConfigTest extends \MageTest_PHPUnit_Framework_TestCase
{
    /**
     * @var \Mage_Core_Model_Config_Base
     */
    protected $config;

    public function setUp()
    {
        $this->config = new \Mage_Core_Model_Config_Base(__DIR__ . '/../../../../../../../app/code/community/ErgonTech/Example/etc/config.xml');
    }

    public function testModuleDeclaration()
    {
        $module = $this->config->getNode('modules/ErgonTech_Example');

        static::assertEquals('ErgonTech_Example', $module->getName());

        static::assertTrue(version_compare($module->version, '0.0.0', '>='));
    }
}