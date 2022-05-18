<?php

namespace AHT\Portfolio\Model\ResourceModel\Images;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'image_id';
    protected $_eventPrefix = 'aht_portfolio_images_collection';
    protected $_eventObject = 'images_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Portfolio\Model\Images', 'AHT\Portfolio\Model\ResourceModel\Images');
    }
}
