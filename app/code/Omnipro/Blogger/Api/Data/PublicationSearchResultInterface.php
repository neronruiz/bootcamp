<?php
namespace Omnipro\Blogger\Api\Data;

use Magento\Framework\Api\Search\SearchResultInterface;
use Omnipro\Blogger\Api\Data\PublicationInterface;

interface PublicationSearchResultInterface extends SearchResultInterface
{
    /**
     * getPosts
     * @return PublicationInterface[]
     */
    public function getPosts();

    /**
     * setPosts
     * @param PublicationInterface[] $posts 
     * @return void
     */
    public function setPosts(array $posts);
}
