<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence;

use FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel\Mapper\ProductListCustomerMapper;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel\Mapper\ProductListCustomerMapperInterface;
use FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerDependencyProvider;
use Orm\Zed\ProductList\Persistence\SpyProductListCustomerQuery;
use Orm\Zed\ProductList\Persistence\SpyProductListQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
 */
class ProductListCustomerPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\ProductList\Persistence\SpyProductListQuery
     */
    public function getProductListQuery(): SpyProductListQuery
    {
        return $this->getProvidedDependency(ProductListCustomerDependencyProvider::PROPEL_QUERY_PRODUCT_LIST);
    }

    /**
     * @return \Orm\Zed\ProductList\Persistence\SpyProductListCustomerQuery
     */
    public function createProductListCustomerQuery(): SpyProductListCustomerQuery
    {
        return SpyProductListCustomerQuery::create();
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCustomer\Persistence\Propel\Mapper\ProductListCustomerMapperInterface
     */
    public function createProductListCustomerMapper(): ProductListCustomerMapperInterface
    {
        return new ProductListCustomerMapper();
    }
}
