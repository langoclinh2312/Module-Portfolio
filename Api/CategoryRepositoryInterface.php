<?php

namespace AHT\Portfolio\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CategoryRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Portfolio\Api\Data\CategoryInterface $Post
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AHT\Portfolio\Api\Data\CategoryInterface $Post);

    /**
     * Retrieve Post.
     *
     * @param int $PostId
     * @return \AHT\Portfolio\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($PostId);

    /**
     * Retrieve Posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\Portfolio\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Post.
     *
     * @param \AHT\Portfolio\Api\Data\CategoryInterface $Post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AHT\Portfolio\Api\Data\CategoryInterface $Post);

    /**
     * Delete Post by ID.
     *
     * @param int $PostId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($PostId);
}
