<?php
namespace Excellence\Hello\Model;
use Magento\Framework\Exception\LocalizedException as CoreException;
class Hello extends \Magento\Framework\Model\AbstractModel
{
	
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Excellence\Hello\Model\ResourceModel\Hello');
    }
}