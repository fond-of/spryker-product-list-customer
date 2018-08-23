<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCollectionTransfer;

class ProductListReader implements ProductListReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface
     */
    protected $productListCustomerRepository;

    /**
     * @param \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface $productListCustomerRepository
     */
    public function __construct(ProductListCustomerRepositoryInterface $productListCustomerRepository)
    {
        $this->productListCustomerRepository = $productListCustomerRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCollectionTransfer
     */
    public function getProductListCollectionByIdCustomerId(CustomerTransfer $customerTransfer): ProductListCollectionTransfer
    {
        $customerTransfer->requireIdCustomer();

        return $this->productListCustomerRepository->getProductListCollectionByIdCustomer($customerTransfer->getIdCustomer());
    }
}
