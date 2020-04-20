<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductList;

use FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListPostSaverPluginInterface;
use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
 */
class ProductListCustomerRelationPostSaverPlugin extends AbstractPlugin implements ProductListPostSaverPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
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
