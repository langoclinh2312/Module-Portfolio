<?php

namespace AHT\Portfolio\Ui\Component\Category\Column;

use AHT\Portfolio\Model\ResourceModel\Category\Grid\CollectionFactory;

class ListOptionForm implements \Magento\Framework\Option\ArrayInterface
{
    protected $_categoryFactory;
    protected $_loadedData;

    public function __construct(
        CollectionFactory $categoryCollectionFactory
    ) {
        $this->_categoryFactory = $categoryCollectionFactory->create();
        // die;
    }

    public function toOptionArray()
    {
        $categories = $this->_categoryFactory->getItems();
        $optionArray = [];
        foreach ($categories as $category) {
            $category = $category->getData();
            array_push($optionArray, [
                'value'  => $category['id'],
                'label'  => $category['name'],
            ]);
        }
        return $optionArray;
    }
}
