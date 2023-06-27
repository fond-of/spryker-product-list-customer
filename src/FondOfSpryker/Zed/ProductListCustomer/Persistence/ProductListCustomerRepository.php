<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence;

use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Orm\Zed\ProductList\Persistence\Map\SpyProductListCustomerTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerPersistenceFactory getFactory()
 */
class ProductListCustomerRepository extends AbstractRepository implements ProductListCustomerRepositoryInterface
{
    /**
     * @param int $idCustomer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCustomer(int $idCustomer): ProductListCollectionTransfer
    {
        /** @var array<\Orm\Zed\ProductList\Persistence\SpyProductList> $productListEntities */
        $productListEntities = $this->getFactory()
            ->getProductListQuery()
            ->useSpyProductListCustomerQuery()
                ->filterByFkCustomer($idCustomer)
            ->endUse()
            ->find();

        $productListCollectionTransfer = new ProductListCollectionTransfer();
        $productListCustomerMapper = $this->getFactory()->createProductListCustomerMapper();

        foreach ($productListEntities as $productListEntity) {
            $productListCollectionTransfer->addProductList(
                $productListCustomerMapper->mapProductList($productListEntity, new ProductListTransfer()),
            );
        }

        return $productListCollectionTransfer;
    }

    /**
     * @param int $idProductList
     *
     * @return array<int>
     */
    public function getRelatedCustomerIdsByIdProductList(int $idProductList): array
    {
        /** @var \Propel\Runtime\Collection\ArrayCollection $collection */
        $collection = $this->getFactory()
            ->createProductListCustomerQuery()
            ->clear()
            ->filterByFkProductList($idProductList)
            ->select(SpyProductListCustomerTableMap::COL_FK_CUSTOMER)
            ->find();

        return $collection->toArray();
    }
}
