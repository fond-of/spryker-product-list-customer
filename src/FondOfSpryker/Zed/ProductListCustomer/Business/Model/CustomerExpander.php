<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Generated\Shared\Transfer\CustomerProductListCollectionTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class CustomerExpander implements CustomerExpanderInterface
{
    protected const TYPE_WHITELIST = 'whitelist';

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface
     */
    protected $productListReader;

    /**
     * @param \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface $productListReader
     */
    public function __construct(ProductListReaderInterface $productListReader)
    {
        $this->productListReader = $productListReader;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function expandCustomerTransferWithProductListIds(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        $customerTransfer->setProductListCollection(new CustomerProductListCollectionTransfer());

        $productListCollectionTransfer = $this->productListReader->getProductListCollectionByIdCustomerId(
            $customerTransfer
        );

        $this->addProductListsToCustomerTransfer($customerTransfer, $productListCollectionTransfer);

        return $customerTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     * @param \Generated\Shared\Transfer\ProductListCollectionTransfer $productListCollectionTransfer
     *
     * @return void
     */
    protected function addProductListsToCustomerTransfer(
        CustomerTransfer $customerTransfer,
        ProductListCollectionTransfer $productListCollectionTransfer
    ): void {
        foreach ($productListCollectionTransfer->getProductLists() as $productListTransfer) {
            $idProductList = $productListTransfer->getIdProductList();

            if ($productListTransfer->getType() === static::TYPE_WHITELIST) {
                $customerTransfer->getProductListCollection()->addWhitelistId($idProductList);

                continue;
            }

            $customerTransfer->getProductListCollection()->addBlacklistId($idProductList);
        }
    }
}
