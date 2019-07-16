<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByCustomerIdAction(CustomerTransfer $customerTransfer): ProductListCollectionTransfer
    {
        return $this->getFacade()->getProductListCollectionByCustomerId($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerWithProductListIdsAction(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        return $this->getFacade()->expandCustomerTransferWithProductListIds($customerTransfer);
    }
}
