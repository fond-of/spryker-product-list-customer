<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface getRepository()
 */
class ProductListCustomerFacade extends AbstractFacade implements ProductListCustomerFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFactory()
            ->createCustomerExpander()
            ->expandCustomerTransferWithProductListIds($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCustomerId(CustomerTransfer $customerTransfer): ProductListCollectionTransfer
    {
        return $this->getFactory()->createProductListReader()->getProductListCollectionByCustomerId($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCustomerRelationTransfer
     */
    public function saveProductListCustomerRelation(
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): ProductListCustomerRelationTransfer {
        return $this->getFactory()->createProductListCustomerRelationWriter()
            ->saveProductListCustomerRelation($productListCustomerRelationTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCustomerRelation(
        ProductListTransfer $productListTransfer
    ): void {
        $this->getFactory()->createProductListCustomerRelationWriter()
            ->deleteProductListCustomerRelation($productListTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandProductListTransferWithProductListCustomerRelationTransfer(
        ProductListTransfer $productListTransfer
    ): ProductListTransfer {
        return $this->getFactory()
            ->createProductListTransferExpander()
            ->expandWithProductListCustomerRelationTransfer($productListTransfer);
    }
}
