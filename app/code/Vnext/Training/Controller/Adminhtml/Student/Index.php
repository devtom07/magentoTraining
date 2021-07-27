<?php
namespace Vnext\Training\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class  Index extends Action {
    protected $_pageFactory;
    public function __construct(Action\Context $context,PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }
    public function execute(){
        return $this->_pageFactory->create();
    }
}
