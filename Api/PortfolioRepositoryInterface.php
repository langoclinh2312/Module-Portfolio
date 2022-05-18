<?php

namespace AHT\Portfolio\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface PortfolioRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Portfolio\Api\Data\PortfolioInterface $post
     * 
     * @return \AHT\Portfolio\Api\Data\PortfolioInterface
     */
    public function save(\AHT\Portfolio\Api\Data\PortfolioInterface $post);

    /**
     * Get object by id
     *
     * @return \AHT\Portfolio\Api\Data\PortfolioInterface
     */
    public function getById(String $id);

    /**
     * Delete Post by ID.
     *
     * @param string $postId
     * @return \AHT\Portfolio\Api\Data\PortfolioInterface
     */
    public function deleteById($postId);
}
