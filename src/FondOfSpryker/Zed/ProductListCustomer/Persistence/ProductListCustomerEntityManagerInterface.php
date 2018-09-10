<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence;

use Generated\Shared\Transfer\ProductListTransfer;

interface ProductListCustomerEntityManagerInterface
{
    /**
     * @param int $idProductList
     * @param array $customerIds
     *
     * @return void
     */
    public function addCustomerRelations(int $idProductList, array $customerIds): void;

    /**
     * @param int $idProductList
     * @param array $customerIds
     *
     * @return void
     */
    public function removeCustomerRelations(int $idProductList, array $customerIds): void;

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCustomerRelations(ProductListTransfer $productListTransfer): void;
}
