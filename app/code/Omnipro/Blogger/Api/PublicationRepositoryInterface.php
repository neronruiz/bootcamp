<?php
namespace Omnipro\Blogger\Api;

use Magento\Framework\Api\Search\SearchCriteriaInterface;
use Omnipro\Blogger\Api\Data\PublicationInterface;
use Omnipro\Blogger\Api\Data\PublicationSearchResultInterface;

interface PublicationRepositoryInterface
{
    /**
     * @param PublicationInterface $publication
     * @return PublicationInterface
     */
   public function save(PublicationInterface $publication);

   /**
    * @param SearchCriteriaInterface $query
    * @return PublicationSearchResultInterface
    */
   public function getList(SearchCriteriaInterface $query);

   
   /**
    * @param int $publication_id
    * @return PublicationInterface
    */
    public function getById($publication_id);

    /**
     * @param int $publication_id
     * @return bool
     */
    public function deleteById($publication_id);
}
