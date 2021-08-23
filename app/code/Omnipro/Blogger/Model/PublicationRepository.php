<?php
namespace Omnipro\Blogger\Model;

use Exception;
use Omnipro\Blogger\Model\PublicationFactory;
use Omnipro\Blogger\Api\Data\PublicationInterface;
use Omnipro\Blogger\Model\ResourceModel\Publication;
use Omnipro\Blogger\Model\ResourceModel\Publication\Collection;
use Omnipro\Blogger\Api\Data\PublicationSearchResultInterface;
use Omnipro\Blogger\Api\PublicationRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;


class PublicationRepository extends AbstractRepository implements PublicationRepositoryInterface
{

  /**
   * @var PublicationFactory
   */
    protected $_publicationFactory;

    /**
     * @var Publication
     */
    protected $_publicationResource;

    /**
     * @var PublicationSearchResultFactory
     */
    protected $_searchResultFactory;

    /**
     * @var Collection
     */
    protected $_publicationCollectionFactory;

    /**
     * @param PublicationFactory $publicationFactory
     * @param Publication $publicationResource
     * @param Collection $publicationCollectionFactory
     * @param PublicationSearchResultInterface $searchResultFactory
     */
    public function __construct(
        PublicationFactory $publicationFactory,
        Publication $publicationResource,
        Collection $publicationCollectionFactory,
        PublicationSearchResultInterfaceFactory $searchResultFactory,
    ) {
        $this->_publicationFactory = $publicationFactory;
        $this->_publicationResource = $publicationResource;
        $this->_publicationCollectionFactory = $publicationCollectionFactory;
        $this->_searchResultFactory = $searchResultFactory;
    }

    /**
     * Save post
     * {@inheritDoc} 
     */
    public function save(PublicationInterface $publication)
    {
        $this->_publicationResource->save();
    }

    /**
     * getById
     *
     * @param int $publication_id 
     * @return PublicationInterface
     * @throws NoSuchEntityException
     */
    public function getById($publication_id)
    {
        $post = $this->_publicationFactory->create();
        $this->_publicationResource->load($post, $publication_id);
        if (!$post->getId()) {
            throw new Exception(__("Unable to find custom data with ID %1", $publication_id));
        }
    }

    public function deleteById($publication_id)
    {
        try {
            $post = $this->_publicationFactory->create();
            $this->_publicationResource->load($post, $publication_id);
            $this->_publicationResource->delete($post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Couldn't delete the entry: %1", $exception->getMessage()));
        }
    }

}
