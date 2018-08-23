<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer;
}
