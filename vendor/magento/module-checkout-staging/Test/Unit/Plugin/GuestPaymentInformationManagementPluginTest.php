<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);


namespace Magento\CheckoutStaging\Test\Unit\Plugin;

use Magento\Checkout\Api\GuestPaymentInformationManagementInterface;
use Magento\CheckoutStaging\Plugin\GuestPaymentInformationManagementPlugin;
use Magento\Quote\Api\Data\AddressInterface;
use Magento\Quote\Api\Data\PaymentInterface;
use Magento\Staging\Model\VersionManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GuestPaymentInformationManagementPluginTest extends TestCase
{
    const CART_ID = 1;
    const EMAIL = 'test@test.com';

    /**
     * @var VersionManager|MockObject
     */
    private $versionManager;

    /**
     * @var GuestPaymentInformationManagementInterface|MockObject
     */
    private $paymentInformationManagement;

    /**
     * @var PaymentInterface|MockObject
     */
    private $paymentMethod;

    /**
     * @var AddressInterface|MockObject
     */
    private $address;

    /**
     * @var GuestPaymentInformationManagementPlugin
     */
    private $plugin;

    protected function setUp(): void
    {
        $this->versionManager = $this->getMockBuilder(VersionManager::class)
            ->disableOriginalConstructor()
            ->setMethods(['isPreviewVersion'])
            ->getMock();

        $this->paymentInformationManagement =
            $this->getMockForAbstractClass(GuestPaymentInformationManagementInterface::class);
        $this->paymentMethod = $this->getMockForAbstractClass(PaymentInterface::class);
        $this->address = $this->getMockForAbstractClass(AddressInterface::class);

        $this->plugin = new GuestPaymentInformationManagementPlugin($this->versionManager);
    }

    public function testBeforeSavePaymentInformationAndPlaceOrder()
    {
        $this->expectException('Magento\Framework\Exception\LocalizedException');
        $this->expectExceptionMessage('The order can\'t be submitted in preview mode.');
        $this->versionManager->expects(static::once())
            ->method('isPreviewVersion')
            ->willReturn(true);

        $this->plugin->beforeSavePaymentInformationAndPlaceOrder(
            $this->paymentInformationManagement,
            self::CART_ID,
            self::EMAIL,
            $this->paymentMethod,
            $this->address
        );
    }
}
