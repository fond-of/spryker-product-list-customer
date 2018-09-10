<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface;

class ProductListCustomerRelationReader implements ProductListCustomerRelationReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface
     */
    protected $productListCustomerRepository;

    /**
     * @param \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface $productListCustomerRepository
     */
    public function __construct(
        ProductListCustomerRepositoryInterface $productListCustomerRepository
    ) {
        $this->productListCustomerRepository = $productListCustomerRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCustomerRelationTransfer
     */
    public function getProductListCustomerRelation(
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): ProductListCustomerRelationTransfer {
        $productListCustomerRelationTransfer->requireIdProductList();

        $customerIds = $this->productListCustomerRepository->getRelatedCustomerIdsByIdProductList(
            $productListCustomerRelationTransfer->getIdProductList()
        );

        $productListCustomerRelationTransfer->setCustomerIds($customerIds);

        return $productListCustomerRelationTransfer;
    }
}
