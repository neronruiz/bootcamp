<?php
namespace Omnipro\UserOpinion\Console\Command\OpinionToUse;

/**
 * Interceptor class for @see \Omnipro\UserOpinion\Console\Command\OpinionToUse
 */
class Interceptor extends \Omnipro\UserOpinion\Console\Command\OpinionToUse implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Omnipro\UserOpinion\Model\UserOpinionFactory $userOpinionFactory)
    {
        $this->___init();
        parent::__construct($userOpinionFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }
}
