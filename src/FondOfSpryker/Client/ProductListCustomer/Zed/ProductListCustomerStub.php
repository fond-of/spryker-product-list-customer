<?php

namespace FondOfSpryker\Client\ProductListCustomer\Zed;

use FondOfSpryker\Client\ProductListCustomer\Dependency\Client\ProductListCustomerToZedRequestClientInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class ProductListCustomerStub implements ProductListCustomerStubInterface
{
    /**
     * @var \FondOfSpryker\Client\ProductListCustomer\Dependency\Client\ProductListCustomerToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\ProductListCustomer\Dependency\Client\ProductListCustomerToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ProductListCustomerToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCustomerId(CustomerTransfer $customerTransfer): ProductListCollectionTransfer
    {
        $url = '/product-list-customer/gateway/get-product-list-collection-by-customer-id';

        /** @var \Generated\Shared\Transfer\ProductListCollectionTransfer $productListCollectionTransfer */
        $productListCollectionTransfer = $this->zedRequestClient->call($url, $customerTransfer);

        return $productListCollectionTransfer;
    }
}
