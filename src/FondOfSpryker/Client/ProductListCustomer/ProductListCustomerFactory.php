<?php

namespace FondOfSpryker\Client\ProductListCustomer;

use FondOfSpryker\Client\ProductListCustomer\Dependency\Client\ProductListCustomerToZedRequestClientInterface;
use FondOfSpryker\Client\ProductListCustomer\Zed\ProductListCustomerStub;
use FondOfSpryker\Client\ProductListCustomer\Zed\ProductListCustomerStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class ProductListCustomerFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Client\CompanyUser\Zed\CompanyUserStubInterface
     */
    public function createZedProductListCustomerStub(): ProductListCustomerStubInterface
    {
        return new ProductListCustomerStub($this->getZedRequestClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Client\ProductListCustomer\Dependency\Client\ProductListCustomerToZedRequestClientInterface
     */
    protected function getZedRequestClient(): ProductListCustomerToZedRequestClientInterface
    {
        return $this->getProvidedDependency(ProductListCustomerDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
