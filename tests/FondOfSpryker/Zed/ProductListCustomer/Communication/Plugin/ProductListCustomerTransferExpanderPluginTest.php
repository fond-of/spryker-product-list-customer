<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;

class ProductListCustomerTransferExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListCustomerTransferExpanderPlugin
     */
    protected $productListCustomerTransferExpanderPlugin;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerFacade;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->customerTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\CustomerTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacade = $this->getMockBuilder(ProductListCustomerFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerTransferExpanderPlugin = new ProductListCustomerTransferExpanderPlugin();

        $this->productListCustomerTransferExpanderPlugin->setFacade($this->productListCustomerFacade);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->productListCustomerFacade->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $customerTransfer = $this->productListCustomerTransferExpanderPlugin->expandTransfer($this->customerTransferMock);

        $this->assertEquals($this->customerTransferMock, $customerTransfer);
    }
}
