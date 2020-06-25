<?php

namespace FondOfSpryker\Zed\ProductListCustomer;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class ProductListCustomerDependencyProviderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerDependencyProvider
     */
    protected $productListCustomerDependencyProvider;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCustomerDependencyProvider = new ProductListCustomerDependencyProvider();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->setMethodsExcept(['factory', 'set', 'offsetSet', 'get', 'offsetGet'])
            ->getMock();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $container = $this->productListCustomerDependencyProvider->provideBusinessLayerDependencies($this->containerMock);

        $this->assertEquals($this->containerMock, $container);
        $this->assertIsArray($container[ProductListCustomerDependencyProvider::PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE]);
        $this->assertCount(0, $container[ProductListCustomerDependencyProvider::PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE]);
    }
}
