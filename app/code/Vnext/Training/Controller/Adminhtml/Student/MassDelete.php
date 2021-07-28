<?php
namespace Vnext\Training\Controller\Adminhtml\Student;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Vnext\Training\Model\ResourceModel\Student\CollectionFactory;
use Vnext\Training\Api\StudentRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level
     */
    const ADMIN_RESOURCE = 'Vnext_training::students';

    /**
     * @var \Vnext\Training\Model\ResourceModel\Student\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Vnext\Training\Api\StudentRepositoryInterface
     */
    private $studentRepository;

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Vnext\Training\Model\ResourceModel\Student\CollectionFactory $collectionFactory
     * @param \Vnext\Training\Api\StudentRepositoryInterface $studentRepository
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        StudentRepositoryInterface $studentRepository
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->studentRepository = $studentRepository;
        parent::__construct($context);
    }

    /**
     * Student delete action
     *
     * @return Redirect
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $block) {
            $block->delete();
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('admin_student/student/index');
    }
}

