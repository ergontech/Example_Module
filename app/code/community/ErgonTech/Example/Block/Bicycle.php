<?php

class ErgonTech_Example_Block_Bicycle extends Mage_Core_Block_Template
{
    /**
     * @var ErgonTech_Example_Block_Bicycle
     */
    private $bicycle;

    public function setBicycle(ErgonTech_Example_Model_Bicycle $bicycle)
    {
        $this->bicycle = $bicycle;
    }

    public function getWheelSize()
    {
        return $this->bicycle->getWheelSize();
    }
}