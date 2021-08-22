<?php
namespace Omnipro\Bootcamp\Controller\personajes;

use \Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\View\Result\PageFactory;

class Episodios implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /**
     * @var ResultFactory;
     */
    protected $_pageFactory;

    protected $_resultFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       PageFactory $pageFactory,
       ResultFactory $_resultFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /**
         * 
         */

        $json= $this->_resultFactory->create(ResultFactory::TYPE_JSON);
        $json->setData([
            'error' => false,
            'message' => __('Personajes consultados exitosamente') 
        ]);

        return $json;
    }
}
