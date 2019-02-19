<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerPersistenceFactory;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel\Mapper\ProductListCustomerMapper;
use FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListCustomerPersistenceFactoryTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $containerMock;

    /**
     * @var \Orm\Zed\ProductList\Persistence\SpyProductListQuery|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $spyProductListQueryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerPersistenceFactory
     */
    protected $productListCustomerPersistenceFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->spyProductListQueryMock = $this->getMockBuilder('\Orm\Zed\ProductList\Persistence\SpyProductListQuery')
            ->disableOriginalConstructor()
            ->getMock();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerPersistenceFactory = new ProductListCustomerPersistenceFactory();
        $this->productListCustomerPersistenceFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testGetProductListQuery(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->with(ProductListCustomerDependencyProvider::PROPEL_QUERY_PRODUCT_LIST)
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ProductListCustomerDependencyProvider::PROPEL_QUERY_PRODUCT_LIST)
            ->willReturn($this->spyProductListQueryMock);

        $productListQuery = $this->productListCustomerPersistenceFactory->getProductListQuery();

        $this->assertEquals($this->spyProductListQueryMock, $productListQuery);
    }

    /**
     * @return void
     */
    public function testCreateProductListCustomerMapper(): void
    {
        $productListCustomerMapper = $this->productListCustomerPersistenceFactory->createProductListCustomerMapper();

        $this->assertInstanceOf(ProductListCustomerMapper::class, $productListCustomerMapper);
    }
}
