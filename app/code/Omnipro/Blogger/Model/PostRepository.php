<?php

declare(strict_types=1);

namespace Omnipro\Blogger\Model;

use Omnipro\Blogger\Api\PostRepositoryInterface;
use Omnipro\Blogger\Api\Data\PostInterfaceFactory;
use Omnipro\Blogger\Api\Data\PostSearchResultInterfaceFactory;
use Omnipro\Blogger\Model\ResourceModel\Post as ResourcePost;
use Omnipro\Blogger\Model\ResourceModel\Publication\CollectionFactory as PostCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Magento\Framework\Api\Search\SearchResultFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Omnipro\Blogger\Api\Data\PostInterface;
use Omnipro\Blogger\Api\Data\PostSearchResultInterface;

class PostRepository implements PostRepositoryInterface
{

    /** @var CollectionProcessorInterface */
    private $_collectionProcessor;

    /** @var DataObjectHelper */
    protected $_dataObjectHelper;

    /** @var JoinProcessorInterface */
    protected $_extensionAttributeJoinProcessor;

    /** @var PostCollectionFactory */
    protected $_postCollectionFactory;

    /** @var PostFactory   */
    protected $_postFactory;

    /** @var SearchResultFactory */
    protected $_serchResultsFactory;

    /** @var DataObjectProcessor */
    protected $_dataObjectProcessor;

    /** @var ExtensibleDataObjectConverter */
    protected $_extensibleDataObjectConverter;

    /** @var ResourcePost */
    protected $_postResource;

    protected $_dataPostFactory;

    /** @var StoreManagerInterface */
    protected $_storeManager;

    /**
     * @param PostFactory $postFactory
     * @param Post $postResource
     * @param Collection $postCollectionFactory
     * @param PostSearchResultInterface $searchResultFactory
     */
    public function __construct(
        ResourcePost $resource,
        PostFactory $postFactory,
        PostInterfaceFactory $dataPostFactory,
        PostCollectionFactory $postCollectionFactory,
        PostSearchResultInterfaceFactory $searchResultFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributeJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->_postResource = $resource;
        $this->_postFactory = $postFactory;
        $this->_postCollectionFactory = $postCollectionFactory;
        $this->_serchResultsFactory = $searchResultFactory;
        $this->_dataObjectHelper = $dataObjectHelper;
        $this->_dataPostFactory = $dataPostFactory;
        $this->_dataObjectProcessor = $dataObjectProcessor;
        $this->_storeManager = $storeManager;
        $this->_collectionProcessor = $collectionProcessor;
        $this->_extensionAttributeJoinProcessor = $extensionAttributeJoinProcessor;
        $this->_extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * Save post
     * {@inheritDoc} 
     */
    public function save(PostInterface $post)
    {
        $postForm = $this->_extensibleDataObjectConverter->toNestedArray($post, [], \Omnipro\Blogger\Api\Data\PostInterface::class);
        $postFormModel = $this->_postFactory->create()->setData($postForm);

        try {
            $this->_postResource->save($postFormModel);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__("Could not save the post: %1", $e->getMessage()));
        }
        return $postFormModel->getDataModel();
    }

    /**
     * {@inheritDoc}
     */
    public function getById($post_id)
    {
        $post = $this->_postFactory->create();
        $this->_postResource->load($post, $post_id);
        if (!$post->getId()) {
            throw new NoSuchEntityException(__("Unable to find custom data with ID %1", $post_id));
        }
        return $post->getDataModel();
    }

    /**
     * {@inheritDoc}
     */
    public function delete(PostInterface $post)
    {
        try {
            $postModel = $this->_postFactory->create();
            $this->_postResource->load($postModel, $post->getId());
            $this->_postResource->delete($postModel);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__("Could not delete the post: %1", $e->getMessage()));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function deleteById($post_id)
    {
        return $this->delete($this->getById($post_id));
    }

    /**
     * {@inheritDoc}
     */
    public function getList(SearchCriteriaInterface $query)
    {
        $collection = $this->_postCollectionFactory->create();
        $this->_extensionAttributeJoinProcessor->process($collection, \Omnipro\Blogger\Api\Data\PostInterface::class);

        $this->_collectionProcessor->process($query, $collection);

        $searchResults = $this->_serchResultsFactory->create();
        $searchResults->setSearchCriteria($query);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
