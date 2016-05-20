<?php
namespace Excellence\Hello\Block;
  
class Main extends \Magento\Framework\View\Element\Template
{   
    protected $registry;
    protected $_testFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\Registry $registry
    )
    { 
        $this->testFactory=$testFactory;
         $this->registry = $registry;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
        $data=$this->testFactory->create();
        $search = $this->registry->registry('searchData');
        $searchTerm = $this->registry->registry('searchTerm');
          if(!empty($search)){
            $collectionData = $search;
          }
          else{
            $collectionData = $this->registry->registry('tableData');
          }
          if(isset($searchTerm)){
            $this->setSearchTerm($searchTerm);
          }
          
          $this->setCollectModel($collectionData);

    }
    
    public function getDeleteUrl($id)
    {
       return $this->_urlBuilder->getUrl("excellence/index/delete/", array('id' => $id));
    }

    public function getEditUrl($id)
    {

     return $this->_urlBuilder->getUrl("excellence/index/edit/", array('id' => $id));
    }
    public function getAddUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/add");
    }
}