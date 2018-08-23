<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Generated\Shared\Transfer\CustomerTransfer;

interface ProductListCustomerFacadeInterface
{
    /**
     * Specification:
     * - Finds product lists by customer.
     * - Expands customer transfer with CustomerProductListCollectionTransfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer;
}
