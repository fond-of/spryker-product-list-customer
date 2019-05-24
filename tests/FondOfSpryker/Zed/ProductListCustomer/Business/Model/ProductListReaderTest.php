<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface;

class ProductListReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRepositoryMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface
     */
    protected $productListReader;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->productListCustomerRepositoryMock = $this->getMockForAbstractClass(ProductListCustomerRepositoryInterface::class);

        $this->customerTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\CustomerTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdCustomer', 'getIdCustomer'])
            ->getMock();

        $this->productListCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCollectionTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListReader = new ProductListReader($this->productListCustomerRepositoryMock);
    }

    /**
     * @return void
     */
    public function testGetProductListCollectionByIdCustomerId(): void
    {
        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('requireIdCustomer');

        $this->customerTransferMock->expects($this->atLeastOnce())
            ->method('getIdCustomer')
            ->willReturn(1);

        $this->productListCustomerRepositoryMock->expects($this->atLeastOnce())
            ->method('getProductListCollectionByIdCustomer')
            ->with(1)
            ->willReturn($this->productListCollectionTransferMock);

        $productListCollectionTransfer = $this->productListReader->getProductListCollectionByCustomerId($this->customerTransferMock);

        $this->assertEquals($this->productListCollectionTransferMock, $productListCollectionTransfer);
    }
}
