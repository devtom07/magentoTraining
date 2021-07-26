<?php

namespace Vnext\Training\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Vnext\Training\Api\Data\StudentInterface;
use Vnext\Training\Api\Data\StudentSearchResultInterfaceFactory;
use Vnext\Training\Api\StudentRepositoryInterface;
use Vnext\Training\Model\ResourceModel\Student;
use Vnext\Training\Model\ResourceModel\Student\CollectionFactory;

class StudentRepository implements StudentRepositoryInterface
{

    /**
     * @var StudentFactory
     */
    private $studentFactory;

    /**
     * @var Student
     */
    private $studentResource;

    /**
     * @var StudentCollectionFactory
     */
    private $studentCollectionFactory;

    /**
     * @var StudentSearchResultInterfaceFactory
     */
    private $searchResultFactory;
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        StudentFactory $studentFactory,
        Student $studentResource,
        CollectionFactory $studentCollectionFactory,
        StudentSearchResultInterfaceFactory $studentSearchResultInterfaceFactory,
        CollectionProcessorInterface $collectionProcessor
    )
    {
        $this->studentFactory = $studentFactory;
        $this->studentResource = $studentResource;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->searchResultFactory = $studentSearchResultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $id
     * @return \Vnext\Training\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $student = $this->studentFactory->create();
        $this->studentResource->load($student, $id);
        if (!$student->getId()) {
            throw new NoSuchEntityException(__('Unable to find Student with ID "%1"', $id));
        }
        return $student;
    }

    /**
     * @param \Vnext\Training\Api\Data\StudentInterface $student
     * @return\Vnext\Training\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(StudentInterface $student)
    {
        $this->studentResource->save($student);
        return $student;
    }

    /**
     * @param \Vnext\Training\Api\Data\StudentInterface $student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(StudentInterface $student)
    {
        try {
            $this->studentResource->delete($student);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }
     /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Vnext\Training\Api\Data\StudentSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->studentCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }
}
