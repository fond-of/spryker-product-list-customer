<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence;

use Generated\Shared\Transfer\ProductListTransfer;
use Orm\Zed\ProductList\Persistence\SpyProductListCustomer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerPersistenceFactory getFactory()
 */
class ProductListCustomerEntityManager extends AbstractEntityManager implements ProductListCustomerEntityManagerInterface
{
    /**
     * @param int $idProductList
     * @param array $customerIds
     *
     * @return void
     */
    public function addCustomerRelations(int $idProductList, array $customerIds): void
    {
        foreach ($customerIds as $idCustomer) {
            $productListCustomerEntity = new SpyProductListCustomer();
            $productListCustomerEntity->setFkProductList($idProductList)
                ->setFkCustomer($idCustomer)
                ->save();
        }
    }

    /**
     * @param int $idProductList
     * @param array $customerIds
     *
     * @return void
     */
    public function removeCustomerRelations(int $idProductList, array $customerIds): void
    {
        if (count($customerIds) === 0) {
            return;
        }

        $productListCustomerEntities = $this->getFactory()
            ->createProductListCustomerQuery()
            ->filterByFkProductList($idProductList)
            ->filterByFkCustomer_In($customerIds)
            ->find();

        foreach ($productListCustomerEntities as $productListCustomer) {
            $productListCustomer->delete();
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCustomerRelations(ProductListTransfer $productListTransfer): void
    {
        $productListCustomerEntities = $this->getFactory()
            ->createProductListCustomerQuery()
            ->filterByFkProductList($productListTransfer->getIdProductList())
            ->find();

        foreach ($productListCustomerEntities as $productListCustomerEntity) {
            $productListCustomerEntity->delete();
        }
    }
}
