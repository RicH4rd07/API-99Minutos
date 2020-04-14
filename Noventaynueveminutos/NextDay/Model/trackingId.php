<?php

namespace Noventaynueveminutos\NextDay\Model;

use Magento\Framework\Model\AbstractModel;

class trackingId extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Noventaynueveminutos\NextDay\Model\ResourceModel\trackingIdResource');
    }

}