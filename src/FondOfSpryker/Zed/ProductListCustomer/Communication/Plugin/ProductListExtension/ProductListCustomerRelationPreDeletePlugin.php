<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListExtension;

use FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListPreDeleterPluginInterface;
use FondOfSpryker\Zed\ProductListExtension\Dependency\Plugin\ProductListPreDeletePluginInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
 */
class ProductListCustomerRelationPreDeletePlugin extends AbstractPlugin implements ProductListPreDeletePluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function execute(ProductListTransfer $productListTransfer): void
    {
        $this->getFacade()->deleteProductListCustomerRelation($productListTransfer);
    }
}
