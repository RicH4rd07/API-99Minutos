<?php

namespace Noventaynueveminutos\NextDay\Model\ResourceModel\Grid;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Noventaynueveminutos\NextDay\Model\trackingId', 'Noventaynueveminutos\NextDay\Model\ResourceModel\trackingIdResource');
    }

}