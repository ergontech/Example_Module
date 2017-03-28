<?php

namespace test;

use ErgonTech_Example_Block_Bicycle;

class ErgonTech_Example_Block_BicycleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $bicycleMock;

    /**
     * @var ErgonTech_Example_Block_Bicycle
     */
    private $block;

    public function setUp()
    {
        $this->bicycleMock = $this->getMock(\ErgonTech_Example_Model_Bicycle::class, [
            'getWheelSize'
        ]);
        $this->block = new ErgonTech_Example_Block_Bicycle;

        $this->block->setBicycle($this->bicycleMock);
    }

    public function testGetBicycleWheelSize()
    {
        $this->bicycleMock
            ->method('getWheelSize')
            ->willReturn('700c');

        static::assertEquals('700c', $this->block->getWheelSize());
    }
}
