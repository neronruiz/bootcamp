<?php
namespace Magento\Eav\Model\Entity\Attribute\Backend\Store;

/**
 * Interceptor class for @see \Magento\Eav\Model\Entity\Attribute\Backend\Store
 */
class Interceptor extends \Magento\Eav\Model\Entity\Attribute\Backend\Store implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function validate($object)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'validate');
        return $pluginInfo ? $this->___callPlugins('validate', func_get_args(), $pluginInfo) : parent::validate($object);
    }
}
