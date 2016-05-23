<?php

namespace Excellence\Hello\Controller\Adminhtml\World;

class Delete extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;
    protected $resultRedirectFactory = false;
    protected $_slidesFactory = false;
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
        $id = $this->getRequest()->getParam('id');
        $model = $this->_testFactory->create();
        if ($id) {
            $model->load($id);
            if($model->delete()){
                $this->messageManager->addSuccess(__('Data Has Been Deleted.'));
            }
            else{
                $this->messageManager->addError(__('Some error occured while deleting the Data. Please try again.'));
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/');
        return $resultRedirect;
    }
}