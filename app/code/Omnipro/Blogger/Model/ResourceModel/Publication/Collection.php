<?php
namespace Omnipro\Blogger\Model\ResourceModel\Publication;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'omnipro_blogger_publication_collection';
    protected $_eventObject = 'publication_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Omnipro\Blogger\Model\Publication', 'Omnipro\Blogger\Model\ResourceModel\Publication');
    }
}
