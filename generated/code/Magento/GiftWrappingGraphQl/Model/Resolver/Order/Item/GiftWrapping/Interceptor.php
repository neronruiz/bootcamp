<?php
namespace Magento\GiftWrappingGraphQl\Model\Resolver\Order\Item\GiftWrapping;

/**
 * Interceptor class for @see \Magento\GiftWrappingGraphQl\Model\Resolver\Order\Item\GiftWrapping
 */
class Interceptor extends \Magento\GiftWrappingGraphQl\Model\Resolver\Order\Item\GiftWrapping implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\GiftWrapping\Api\WrappingRepositoryInterface $wrappingRepository, \Magento\Sales\Api\OrderItemRepositoryInterface $orderItemRepository, \Magento\Framework\GraphQl\Query\Uid $uidEncoder)
    {
        $this->___init();
        parent::__construct($wrappingRepository, $orderItemRepository, $uidEncoder);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
