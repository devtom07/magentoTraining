<?php

namespace Vnext\Training\Api;

interface StudentRepositoryInterface
{
    /**
     * @param int $id
     * @return \Magento4u\SampleRepository\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Magento4u\SampleRepository\Api\Data\StudentInterface $student
     * @return \Magento4u\SampleRepository\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Vnext\Training\Api\Data\StudentInterface $student);

    /**
     * @param \Magento4u\SampleRepository\Api\Data\StudentInterface $student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Vnext\Training\Api\Data\StudentInterface $student);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento4u\SampleRepository\Api\Data\StudentSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
