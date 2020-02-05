<?php
namespace Lof\HieuStudentManage\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Lof\HieuStudentManage\Model\StudentFactory $postFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection =$post->getCollection();
        foreach ($collection as $item) {
            var_dump($item->getData());
        }
        exit();
        return $this->_pageFactory->create();
    }
}
