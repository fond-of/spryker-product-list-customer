<?php

namespace FondOfSpryker\Zed\ProductListCustomer;

use Orm\Zed\ProductList\Persistence\SpyProductListQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListCustomerDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_PRODUCT_LIST = 'PROPEL_QUERY_PRODUCT_LIST';
    public const PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE = 'PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);
        $container = $this->addProductListPropelQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addProductListCustomerPostSavePlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductListPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_PRODUCT_LIST] = function (Container $container) {
            return SpyProductListQuery::create();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductListCustomerPostSavePlugins(Container $container): Container
    {
        $container[static::PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE] = function () {
            return $this->getProductListCustomerRelationPostSavePlugins();
        };

        return $container;
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCustomerExtension\Dependency\Plugin\ProductListCustomerPostSavePluginInterface[]
     */
    protected function getProductListCustomerRelationPostSavePlugins(): array
    {
        return [];
    }
}
