<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander;

class ProductListCustomerFacadeTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerExpanderMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerBusinessFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerBusinessFactoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface
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

        $this->customerExpanderMock = $this->getMockBuilder(CustomerExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerBusinessFactoryMock = $this->getMockBuilder(ProductListCustomerBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacade = new ProductListCustomerFacade();

        $this->productListCustomerFacade->setFactory($this->productListCustomerBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithProductListIds(): void
    {
        $this->productListCustomerBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderMock);

        $this->customerExpanderMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithProductListIds')
            ->willReturn($this->customerTransferMock);

        $actualCustomerTransfer = $this->productListCustomerFacade->expandCustomerTransferWithProductListIds($this->customerTransferMock);

        $this->assertEquals($this->customerTransferMock, $actualCustomerTransfer);
    }
}
