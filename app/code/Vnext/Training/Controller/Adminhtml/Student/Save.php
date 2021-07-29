<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Vnext\Training\Controller\Adminhtml\Student;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Vnext\Training\Model\ResourceModel\Student as Resource;
use Vnext\Training\Model\Student;
use Vnext\Training\Model\StudentFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;

/**
 * Save CMS block action.
 */
class Save extends \Vnext\Training\Controller\Adminhtml\Block implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var BlockFactory
     */
    private $studentFactory;

    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;
    
    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param BlockFactory|null $blockFactory
     * @param BlockRepositoryInterface|null $blockRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        DataPersistorInterface $dataPersistor,
        StudentFactory $studentFactory,
        Resource $resource
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->studentFactory = $studentFactory;
        $this->resource = $resource;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            if (empty($data['entity_id'])) {
                $data['entity_id'] = null;
            }

            /** @var \Magento\Cms\Model\Block $model */
            $model = $this->studentFactory->create();

            $id = $this->getRequest()->getParam('entity_id');
            if ($id) {
                try {
                    $this->resource->load($model, $id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This block no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }
            $model->setData($data);

            try {
                $this->resource->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the block.'));
                $this->dataPersistor->clear('students');
                // return $this->processBlockReturn($model, $data, $resultRedirect); 
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the block.'));
            }

            $this->dataPersistor->set('students', $data);
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Process and set the block return
     *
     * @param \Magento\Cms\Model\Block $model
     * @param array $data
     * @param \Magento\Framework\Controller\ResultInterface $resultRedirect
     * @return \Magento\Framework\Controller\ResultInterface
     */
    private function processBlockReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect ==='continue') {
            $resultRedirect->setPath('*/*/fix', ['entity_id' => $model->getId()]);
        } else if ($redirect === 'close') {
            $resultRedirect->setPath('*/*/');
        } 
        return $resultRedirect;
    }

   
}
