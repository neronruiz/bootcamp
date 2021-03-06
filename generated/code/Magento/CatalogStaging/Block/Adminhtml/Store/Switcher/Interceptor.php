<?php
namespace Magento\CatalogStaging\Block\Adminhtml\Store\Switcher;

/**
 * Interceptor class for @see \Magento\CatalogStaging\Block\Adminhtml\Store\Switcher
 */
class Interceptor extends \Magento\CatalogStaging\Block\Adminhtml\Store\Switcher implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Store\Model\WebsiteFactory $websiteFactory, \Magento\Store\Model\GroupFactory $storeGroupFactory, \Magento\Store\Model\StoreFactory $storeFactory, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $websiteFactory, $storeGroupFactory, $storeFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getHintUrl()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHintUrl');
        return $pluginInfo ? $this->___callPlugins('getHintUrl', func_get_args(), $pluginInfo) : parent::getHintUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl($route = '', $params = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUrl');
        return $pluginInfo ? $this->___callPlugins('getUrl', func_get_args(), $pluginInfo) : parent::getUrl($route, $params);
    }
}
