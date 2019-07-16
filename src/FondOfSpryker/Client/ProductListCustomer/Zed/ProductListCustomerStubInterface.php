<?php

namespace FondOfSpryker\Client\ProductListCustomer\Zed;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListCustomerStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCustomerId(
        CustomerTransfer $customerTransfer
    ): ProductListCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer;
}
