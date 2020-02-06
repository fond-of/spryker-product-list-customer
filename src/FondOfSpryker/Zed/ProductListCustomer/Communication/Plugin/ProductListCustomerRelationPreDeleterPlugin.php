<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListPreDeleterPluginInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
 */
class ProductListCustomerRelationPreDeleterPlugin extends AbstractPlugin implements ProductListPreDeleterPluginInterface
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
    public function preDelete(ProductListTransfer $productListTransfer): void
    {
        $this->getFacade()->deleteProductListCustomerRelation($productListTransfer);
    }
}
