<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

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
        $this->productListCustomerRepositoryMock = $this->getMockBuilder(ProductListCustomerRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCollectionTransferMock = $this->getMockBuilder(ProductListCollectionTransfer::class)
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
