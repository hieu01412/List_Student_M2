<?php

namespace Lof\HieuStudentManage\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'student_id';
    protected $_eventPrefix = 'hieustudentmanage_studentinfo_collection';
    protected $_eventObject = 'student_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Lof\HieuStudentManage\Model\Student', 'Lof\HieuStudentManage\Model\ResourceModel\Student');
    }

}
