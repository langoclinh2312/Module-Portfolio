<?php

namespace AHT\Portfolio\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;


class Image extends \Magento\Ui\Component\Listing\Columns\Column
{


    /**
     * @var \AHT\Portfolio\Model\portfolio
     */
    protected $portfolio;
    protected $_storeManager;
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param \AHT\Portfolio\Model\portfolio $portfolio
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \AHT\Portfolio\Model\Portfolio $portfolio,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
        $this->portfolio = $portfolio;
        $this->_storeManager = $storeManager;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as &$item) {
                $portfolio = new \Magento\Framework\DataObject($item);
                $item[$fieldName . '_src'] = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . "portfolio/index/" . $portfolio['path'];
                $item[$fieldName . '_orig_src'] = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . "portfolio/index/" . $portfolio['path'];
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl(
                    "portfolio/index/edit",
                    ['id' => $portfolio['id']]
                );
                $item[$fieldName . '_alt'] = $portfolio['name'];
            }
        }

        return $dataSource;
    }
}
