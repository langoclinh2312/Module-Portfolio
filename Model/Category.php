<?php

namespace AHT\Portfolio\Model;

use AHT\Portfolio\Api\Data\CategoryInterface;

class Category extends \Magento\Framework\Model\AbstractModel implements CategoryInterface
{
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
        null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
        null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    public function _construct()
    {
        $this->_init('AHT\Portfolio\Model\ResourceModel\Category');
    }
}
