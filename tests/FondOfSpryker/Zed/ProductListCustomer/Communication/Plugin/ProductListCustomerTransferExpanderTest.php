<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;
use Generated\Shared\Transfer\CustomerTransfer;

class ProductListCustomerTransferExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListCustomerTransferExpander
     */
    protected $productListCustomerTransferExpander;

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

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacade = $this->getMockBuilder(ProductListCustomerFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerTransferExpander = new ProductListCustomerTransferExpander();

        $this->productListCustomerTransferExpander->setFacade($this->productListCustomerFacade);
    }

    /**
     * @return void
     */
    public function test(): void
    {
        $this->productListCustomerFacade->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithProductListIds')
            ->with($this->customerTransferMock)
            ->willReturn($this->customerTransferMock);

        $customerTransfer = $this->productListCustomerTransferExpander->expandTransfer($this->customerTransferMock);

        $this->assertEquals($this->customerTransferMock, $customerTransfer);
    }
}
