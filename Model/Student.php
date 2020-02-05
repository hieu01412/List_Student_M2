<?php

namespace Lof\HieuStudentManage\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Student extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'hieustudentmanage_studentinfo';

    protected $_cacheTag = 'hieustudentmanage_studentinfo';

    protected $_eventPrefix = 'hieustudentmanage_studentinfo';

    protected function _construct()
    {
        $this->_init('Lof\HieuStudentManage\Model\ResourceModel\Student');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
