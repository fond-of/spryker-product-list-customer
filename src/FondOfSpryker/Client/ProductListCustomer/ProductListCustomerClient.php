<?php

namespace FondOfSpryker\Client\ProductListCustomer;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\ProductListCustomer\ProductListCustomerFactory getFactory()
 */
class ProductListCustomerClient extends AbstractClient implements ProductListCustomerClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCustomerId(CustomerTransfer $customerTransfer): ProductListCollectionTransfer
    {
        return $this->getFactory()
            ->createZedProductListCustomerStub()
            ->getProductListCollectionByCustomerId($customerTransfer);
    }
}
