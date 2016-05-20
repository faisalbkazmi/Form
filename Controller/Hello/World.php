<?php
namespace Excellence\Hello\Controller\Hello;
 
 
class World extends \Magento\Framework\App\Action\Action
{
    protected $registry;
    protected $resultPageFactory;
    protected $_testFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry

        )
    {
        $this->resultPageFactory = $resultPageFactory;  
        $this->registry = $registry;     
        $this->_testFactory=$testFactory;
        return parent::__construct($context);
    }
     
    public function execute()
    {
        $model = $this->_testFactory->create();
        $post = $this->getRequest()->getPost('data');
        if(isset($post)){
            $searchData = $model->searchData($post['srch']);  
            $this->registry->register('searchData', $searchData);
            $this->registry->register('searchTerm', $post['srch']);
        } else{
            $tableData = $model->getTableData();
            $this->registry->register('tableData', $tableData); 
        }
        return $this->resultPageFactory->create(); 
    } 

}
