<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface;
use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;
use Spryker\Zed\Kernel\Persistence\EntityManager\TransactionTrait;

class ProductListCustomerRelationWriter implements ProductListCustomerRelationWriterInterface
{
    use TransactionTrait;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface
     */
    protected $productListCustomerEntityManager;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface
     */
    protected $productListCustomerRelationReader;

    /**
     * @param \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface $productListCustomerEntityManager
     * @param \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface $productListCustomerRelationReader
     */
    public function __construct(
        ProductListCustomerEntityManagerInterface $productListCustomerEntityManager,
        ProductListCustomerRelationReaderInterface $productListCustomerRelationReader
    ) {
        $this->productListCustomerEntityManager = $productListCustomerEntityManager;
        $this->productListCustomerRelationReader = $productListCustomerRelationReader;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCustomerRelationTransfer
     */
    public function saveProductListCustomerRelation(
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): ProductListCustomerRelationTransfer {
        return $this->getTransactionHandler()->handleTransaction(
            function () use ($productListCustomerRelationTransfer) {
                return $this->executeSaveProductListCustomerRelationTransaction($productListCustomerRelationTransfer);
            }
        );
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return \Generated\Shared\Transfer\ProductListCustomerRelationTransfer
     */
    protected function executeSaveProductListCustomerRelationTransaction(
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): ProductListCustomerRelationTransfer {
        $productListCustomerRelationTransfer->requireIdProductList();
        $idProductList = $productListCustomerRelationTransfer->getIdProductList();

        $requestedCustomerIds = $this->getRequestedCustomerIds($productListCustomerRelationTransfer);
        $relatedCustomerIds = $this->getRelatedCustomerIds($productListCustomerRelationTransfer);

        $saveCustomerIds = array_diff($requestedCustomerIds, $relatedCustomerIds);
        $deleteCustomerIds = array_diff($relatedCustomerIds, $requestedCustomerIds);

        $this->productListCustomerEntityManager->addCustomerRelations($idProductList, $saveCustomerIds);
        $this->productListCustomerEntityManager->removeCustomerRelations($idProductList, $deleteCustomerIds);

        return $productListCustomerRelationTransfer->setCustomerIds(
            $this->getRelatedCustomerIds($productListCustomerRelationTransfer)
        );
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return int[]
     */
    protected function getRelatedCustomerIds(
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): array {
        $currentProductListCustomerRelationTransfer = $this->productListCustomerRelationReader
            ->getProductListCustomerRelation($productListCustomerRelationTransfer);

        return $currentProductListCustomerRelationTransfer->getCustomerIds();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
     *
     * @return int[]
     */
    protected function getRequestedCustomerIds(
        ProductListCustomerRelationTransfer $productListCustomerRelationTransfer
    ): array {
        return $productListCustomerRelationTransfer->getCustomerIds();
    }

    /**
     * @param \Generated\Shared\Transfer\ProductListTransfer $productListTransfer
     *
     * @return void
     */
    public function deleteProductListCustomerRelation(ProductListTransfer $productListTransfer): void
    {
        $this->productListCustomerEntityManager->deleteProductListCustomerRelations($productListTransfer);
    }
}
