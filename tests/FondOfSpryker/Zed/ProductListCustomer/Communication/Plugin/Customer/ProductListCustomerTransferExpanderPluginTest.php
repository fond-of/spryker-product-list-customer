<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\Customer;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;
use Generated\Shared\Transfer\CustomerTransfer;

class ProductListCustomerTransferExpanderPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\Customer\ProductListCustomerTransferExpanderPlugin
     */
    protected $productListCustomerTransferExpanderPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer
     */
    protected $productListTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
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
