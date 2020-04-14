<?php

namespace Noventaynueveminutos\NextDay\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class trackingIdResource extends AbstractDb
{
    protected function _construct()
    {
        $this-> _init('noventaynueve_minutos', 'noventaynueveminutos_id');
    }

} //CIERRE class trackingId