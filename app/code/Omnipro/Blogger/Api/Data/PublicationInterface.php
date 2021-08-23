<?php
namespace Omnipro\Blogger\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PublicationInterface extends ExtensibleDataInterface
{

  /**
   * @param int $post_id 
   * @return void
   */
  public function setPostId($post_id);

    /**
     * @return int
     */
   public function getPostId();

   /**
    * @param string $title
    * @return void
    */
   public function setPostTitle($title);

   /**
    * @return string
    */
   public function getPostTitle();

   /**
    * @param string $content
    * @return void
    */
   public function setPostContent($content);

   /**
    * @return string
    */
   public function getPostContent();

   /**
    * @param string $image_url
    * @return void
    */
   public function setPostImage($image_url);

   /**
    * @return string
    */
   public function getPostImage();

   /**
    * @param string $author_email 
    * @return void
    */
   public function setPostAuthor($author_email);

   /**
    * @return string
    */
   public function getPostAuthor();

   /**
    * @return int
    */
   public function getPublicationDate();
}
