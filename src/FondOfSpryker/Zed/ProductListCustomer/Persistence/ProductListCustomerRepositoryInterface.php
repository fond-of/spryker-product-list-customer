<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence;

use Generated\Shared\Transfer\ProductListCollectionTransfer;

interface ProductListCustomerRepositoryInterface
{
    /**
     * @param int $idCustomer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCustomer(int $idCustomer): ProductListCollectionTransfer;

    /**
     * @param int $idProductList
     *
     * @return array<int>
     */
    public function getRelatedCustomerIdsByIdProductList(int $idProductList): array;
}
