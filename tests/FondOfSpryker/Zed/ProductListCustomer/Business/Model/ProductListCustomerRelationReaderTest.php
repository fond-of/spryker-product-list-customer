<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface;

class ProductListCustomerRelationReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRepositoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReader
     */
    protected $productListCustomerRelationReader;

    /**
     * @var \Generated\Shared\Transfer\ProductListCustomerRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRelationTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCustomerRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCustomerRelationTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdProductList', 'getIdProductList', 'setCustomerIds'])
            ->getMock();

        $this->productListCustomerRepositoryMock = $this->getMockForAbstractClass(ProductListCustomerRepositoryInterface::class);

        $this->productListCustomerRelationReader = new ProductListCustomerRelationReader($this->productListCustomerRepositoryMock);
    }

    /**
     * @return void
     */
    public function testGetProductListCustomerRelation(): void
    {
        $idProductList = 1;
        $customerIds = [1, 2, 3];

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('requireIdProductList');

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn($idProductList);

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('setCustomerIds')
            ->with($customerIds);

        $this->productListCustomerRepositoryMock->expects($this->atLeastOnce())
            ->method('getRelatedCustomerIdsByIdProductList')
            ->with($idProductList)
            ->willReturn($customerIds);

        $this->productListCustomerRelationReader->getProductListCustomerRelation($this->productListCustomerRelationTransferMock);
    }
}
