<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCustomerId(CustomerTransfer $customerTransfer): ProductListCollectionTransfer;
}
