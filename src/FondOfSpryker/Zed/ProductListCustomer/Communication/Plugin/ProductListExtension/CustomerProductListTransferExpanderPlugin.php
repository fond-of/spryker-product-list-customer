<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListExtension;

use FondOfSpryker\Zed\ProductListExtension\Dependency\Plugin\ProductListTransferExpanderPluginInterface;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
 */
class CustomerProductListTransferExpanderPlugin extends AbstractPlugin implements ProductListTransferExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandTransfer(ProductListTransfer $productListTransfer): ProductListTransfer
    {
        $productListTransfer = $this->getFacade()
            ->expandProductListTransferWithProductListCustomerRelationTransfer($productListTransfer);

        return $productListTransfer;
    }
}
