<?php
namespace Magento\Newsletter\Controller\Adminhtml\Subscriber\MassDelete;

/**
 * Interceptor class for @see \Magento\Newsletter\Controller\Adminhtml\Subscriber\MassDelete
 */
class Interceptor extends \Magento\Newsletter\Controller\Adminhtml\Subscriber\MassDelete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, ?\Magento\Newsletter\Model\SubscriberFactory $subscriberFactory = null)
    {
        $this->___init();
        parent::__construct($context, $fileFactory, $subscriberFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
