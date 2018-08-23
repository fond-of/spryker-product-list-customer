<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Persistence;

use Generated\Shared\Transfer\ProductListCollectionTransfer;
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
        /** @var \Orm\Zed\ProductList\Persistence\SpyProductList[] $productListEntities */
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
                $productListCustomerMapper->mapProductList($productListEntity, new ProductListTransfer())
            );
        }

        return $productListCollectionTransfer;
    }
}
