<?php
namespace Vnext\Training\Model\ResourceModel\Student;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection{
    public function _construct()
    {
        $this->_init("Vnext\Training\Model\Student","Vnext\Training\Model\ResourceModel\Student");
    }
}