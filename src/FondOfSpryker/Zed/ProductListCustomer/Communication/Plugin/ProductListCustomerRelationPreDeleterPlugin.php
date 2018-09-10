<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use FondOfSpryker\Zed\ProductList\Business\ProductList\ProductListPreDeleterInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface getFacade()
 */
class ProductListCustomerRelationPreDeleterPlugin extends AbstractPlugin implements ProductListPreDeleterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function preDelete(ProductListTransfer $productListTransfer): void
    {
        $this->getFacade()->deleteProductListCustomerRelation($productListTransfer);
    }
}
