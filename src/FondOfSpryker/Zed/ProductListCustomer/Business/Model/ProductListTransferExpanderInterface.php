<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Generated\Shared\Transfer\ProductListTransfer;

interface ProductListTransferExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandWithProductListCustomerRelationTransfer(ProductListTransfer $productListTransfer): ProductListTransfer;
}
