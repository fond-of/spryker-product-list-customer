<?php

namespace FondOfSpryker\Zed\ProductListCustomer;

use Closure;
use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class ProductListCustomerDependencyProviderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject|null
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
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('offsetSet')
            ->with(
                ProductListCustomerDependencyProvider::PROPEL_QUERY_PRODUCT_LIST,
                $this->isInstanceOf(Closure::class)
            );

        $this->productListCustomerDependencyProvider->providePersistenceLayerDependencies($this->containerMock);
    }
}
