<?php
namespace Excellence\Hello\Controller\Index;
 use Magento\Framework\Controller\ResultFactory;
class Edit extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
         \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\App\Action\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
         $this->resultRedirectFactory = $context->getResultRedirectFactory();
        $this->_testFactory = $testFactory;
         $this->messageManager=$messageManager;
        $this->resultPageFactory = $resultPageFactory;       
        return parent::__construct($context);
    }
    
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->_testFactory->create();
        $post = $this->getRequest()->getPost('data');
        if(isset($post['submit'])) {
            $data->saveEdit($post,$id);
            $this->messageManager->addSuccess( __('Item Edited') );
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('excellence/Hello/World');
        return $resultRedirect;
        }
        
        return $this->resultPageFactory->create(); 
    } 
    
}