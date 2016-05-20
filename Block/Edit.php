<?php
namespace Excellence\Hello\Block;
  
class Edit extends \Magento\Framework\View\Element\Template
{   
    protected $_testFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory
    )
    {
        $this->_testFactory = $testFactory;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
        $data = $this->_testFactory->create();
        $id = $this->getRequest()->getParam('id');
        $collectionData = $data->getDataById($id);
        $this->setRowData($collectionData);
    }
    public function getListUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/Hello/World");
    }
}