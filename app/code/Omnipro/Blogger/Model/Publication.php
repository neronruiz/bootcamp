<?php
namespace Omnipro\Blogger\Model\ResourceModel;

use Magento\Framework\Model\AbstractExtensibleModel;
use Omnipro\Blogger\Api\Data\PublicationInterface;

/**
 * Publication
 * @package Omnipro\Blogger\Model
 */
class Publication extends AbstractExtensibleModel implements PublicationInterface {

    const POST_ID = "post_id";
    const POST_TITLE = "post_title";
    const POST_CONTENT = "post_content";
    const POST_IMAGE = "image_url";
    const POST_AUTHOR = "author_email";
    const PUBLICATION_DATE = 1629667855;

    protected function _construct() {
        $this->_init(Omnipro\Blogger\Model\ResourceModel\Publication::class);
    }

    public function getPostId() {
        return $this->getData(self::POST_ID);
    }

    public function setPostId($post_id) {
        $this->setData(self::POST_ID, $post_id);
    }

    public function getPostTitle()
    {
        return $this->getData(self::POST_TITLE);
    }

    public function setPostTitle($title)
    {
        $this->setData(self::POST_TITLE, $title);
    }

    public function getPostContent()
    {
        return $this->getData(self::POST_CONTENT);
    }

    public function setPostContent($content)
    {
        $this->setData(self::POST_CONTENT, $content);
    }

    public function getPostImage()
    {
        return $this->getData(self::POST_IMAGE);
    }

    public function setPostImage($image_url)
    {
        $this->setData(self::POST_IMAGE, $image_url);
    }

    public function getPostAuthor()
    {
        return $this->getData(self::POST_AUTHOR);
    }

    public function setPostAuthor($author_email)
    {
        $this->setData(self::POST_AUTHOR, $author_email);
    }

    public function getPublicationDate()
    {
        return $this->getData(self::PUBLICATION_DATE);
    }
}
