<?php
namespace Excellence\Hello\Model\ResourceModel\Affiliate;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Excellence\Hello\Model\Hello', 'Excellence\Hello\Model\ResourceModel\Hello');
    }
}