<?php

namespace AHT\Portfolio\Model;

use AHT\Portfolio\Api\Data;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Portfolio\Model\ResourceModel\Images as ResourcePost;
use AHT\Portfolio\Model\ResourceModel\Portfolio\CollectionFactory as ImagesCollectionFactory;
use AHT\Portfolio\Api\Data\ImagesInterface;

class ImagesRepository implements ImagesInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;

    /**
     * @var PostFactory
     */
    protected $PostFactory;

    /**
     * @var ImagesCollectionFactory
     */
    protected $ImagesCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourcePost $resource
     * @param PostFactory $PostFactory
     * @param Data\PortfolioInterfaceFactory $dataPostFactory
     * @param ImagesCollectionFactory $ImagesCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourcePost $resource,
        ImagesFactory $PostFactory,
        ImagesCollectionFactory $ImagesCollectionFactory
    ) {
        $this->resource = $resource;
        $this->PostFactory = $PostFactory;
        $this->ImagesCollectionFactory = $ImagesCollectionFactory;
    }

    /**
     * Save Post data
     *
     * @param  \AHT\Portfolio\Api\Data\ImagesInterface $post
     * @return \AHT\Portfolio\Api\Data\ImagesInterface
     */

    public function save(ImagesInterface $post)
    {
        try {
            $this->resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }

        return $post;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param [type] $id
     * @return \AHT\Portfolio\Model\ResourceModel\Images
     */
    public function getById($id)
    {
        $postId = intval($id);
        $Post = $this->PostFactory->create();
        $Post->load($postId);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $PostId));
        }
        $result = $Post;
        return $result;
    }

    public function deleteById($postId)
    {
        $id = intval($postId);
        if ($this->resource->delete($this->getById($id))) {
            return json_encode([
                "status" => 200,
                "message" => "Successfully"
            ]);
        }
    }
}
