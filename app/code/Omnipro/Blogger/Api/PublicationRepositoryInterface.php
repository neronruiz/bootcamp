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
    * @param string $publication_id
    * @return mixed
    */
    public function getById($publication_id);

    /**
     * @param PublicationInterface $publication
     * @return PublicationInterface
     */
    public function delete(PublicationInterface $publication);

    /**
     * @param string $publication_id
     * @return mixed
     */
    public function deleteById($publication_id);
}
