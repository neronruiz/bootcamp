<?php
namespace Omnipro\Bootcamp\Controller\personajes\Episodios;

/**
 * Interceptor class for @see \Omnipro\Bootcamp\Controller\personajes\Episodios
 */
class Interceptor extends \Omnipro\Bootcamp\Controller\personajes\Episodios implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Framework\Controller\ResultFactory $_resultFactory)
    {
        $this->___init();
        parent::__construct($pageFactory, $_resultFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }
}
