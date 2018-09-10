<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductList\Business\ProductList\ProductListPostSaverInterface;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface getFacade()
 */
class ProductListCustomerRelationPostSaverPlugin extends AbstractPlugin implements ProductListPostSaverInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function postSave(ProductListTransfer $productListTransfer): ProductListTransfer
    {
        $productListCustomerRelationTransfer = $productListTransfer->getProductListCustomerRelation();

        if (!$productListCustomerRelationTransfer) {
            return $productListTransfer;
        }

        $productListTransfer = $this->saveProductListCustomerRelation(
            $productListTransfer,
            $productListCustomerRelationTransfer
        );

        return $productListTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    protected function saveProductListCustomerRelation(
        ProductListTransfer $productListTransfer,
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): ProductListTransfer {
        $productListCustomerRelationTransfer->setIdProductList($productListTransfer->getIdProductList());

        $productListCustomerRelationTransfer = $this->getFacade()
            ->saveProductListCustomerRelation($productListCustomerRelationTransfer);

        $productListTransfer->setProductListCustomerRelation($productListCustomerRelationTransfer);

        return $productListTransfer;
    }
}
