<?php
namespace Excellence\Hello\Controller\Adminhtml\World;
class Save extends \Magento\Backend\App\Action
{
   
    
    protected $resultPageFactory = false;
    protected $resultRedirectFactory = false;
    protected $_testFactory = false;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Excellence\Hello\Model\TestFactory $testFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirectFactory = $context->getResultRedirectFactory();
        $this->_testFactory = $testFactory;
    }
    public function execute()
    {
        
        $post = $this->getRequest()->getPostValue();
        // print_r($post); die();
        $test = $this->_testFactory->create();
        $test->setName($post['name']);
        $test->setMessage($post['message']);
        $test->setEmail($post['email']);
        $test->save();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('hello/world/index');
        return $resultRedirect;
    }
}