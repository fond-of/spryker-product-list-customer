<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListTransferExpander implements ProductListTransferExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface
     */
    protected $productListCustomerRelationReader;

    /**
     * @param \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface $productListCustomerRelationReader
     */
    public function __construct(ProductListCustomerRelationReaderInterface $productListCustomerRelationReader)
    {
        $this->productListCustomerRelationReader = $productListCustomerRelationReader;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListTransfer
     */
    public function expandWithProductListCustomerRelationTransfer(ProductListTransfer $productListTransfer): ProductListTransfer
    {
        $productListCustomerRelationTransfer = new ProductListCustomerRelationTransfer();

        $productListCustomerRelationTransfer->setIdProductList($productListTransfer->getIdProductList());

        $productListCustomerRelationTransfer = $this->productListCustomerRelationReader
            ->getProductListCustomerRelation($productListCustomerRelationTransfer);

        $productListTransfer->setProductListCustomerRelation($productListCustomerRelationTransfer);

        return $productListTransfer;
    }
}
