<?php
namespace Omnipro\Blogger\Api\Data;

use Magento\Framework\Api\Search\SearchResultInterface;
use Omnipro\Blogger\Api\Data\PostInterface;

interface PostSearchResultInterface extends SearchResultInterface
{
    /**
     * getPosts
     * @return PostInterFace[]
     */
    public function getPosts();

    /**
     * setPosts
     * @param PublicationInterface[] $posts 
     * @return void
     */
    public function setPosts(array $posts);
}
