<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Excellence\Hello\Controller\Adminhtml\Hello;
use Magento\Framework\Controller\ResultFactory;
class Index extends \Advanced\Affiliate\Controller\Adminhtml\Affiliate
{
    public function executeInternal()
    {
       $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('QTV'));
        return $resultPage;
    }
}