<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence\Mapper;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel\Mapper\ProductListCustomerMapper;

class ProductListCustomerMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel\Mapper\ProductListCustomerMapper
     */
    protected $productListCustomerMapper;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Orm\Zed\ProductList\Persistence\SpyProductList|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $spyProductListTransfer;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCustomerMapper = new ProductListCustomerMapper();

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['fromArray'])
            ->getMock();

        $this->spyProductListTransfer = $this->getMockBuilder('\Orm\Zed\ProductList\Persistence\SpyProductList')
            ->disableOriginalConstructor()
            ->setMethods(['toArray'])
            ->getMock();
    }

    /**
     * @return void
     */
    public function testMapProductList(): void
    {
        $toArrayResult = [];

        $this->spyProductListTransfer->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn($toArrayResult);

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('fromArray')
            ->with($toArrayResult, true)
            ->willReturn($this->productListTransferMock);

        $productListTransfer = $this->productListCustomerMapper->mapProductList(
            $this->spyProductListTransfer,
            $this->productListTransferMock
        );

        $this->assertEquals($this->productListTransferMock, $productListTransfer);
    }
}
