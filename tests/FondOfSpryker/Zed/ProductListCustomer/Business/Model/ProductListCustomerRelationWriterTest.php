<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface;
use ReflectionClass;
use ReflectionException;

class ProductListCustomerRelationWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriter
     */
    protected $productListCustomerRelationWriter;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRelationReaderMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerEntityManagerMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCustomerRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRelationTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCustomerRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $currentProductListCustomerRelationTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListCustomerEntityManagerMock = $this->getMockForAbstractClass(ProductListCustomerEntityManagerInterface::class);

        $this->productListCustomerRelationReaderMock = $this->getMockForAbstractClass(ProductListCustomerRelationReaderInterface::class);

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCustomerRelationTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdProductList', 'getIdProductList', 'getCustomerIds', 'setCustomerIds'])
            ->getMock();

        $this->currentProductListCustomerRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCustomerRelationTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getCustomerIds'])
            ->getMock();

        $this->productListCustomerRelationWriter = new ProductListCustomerRelationWriter(
            $this->productListCustomerEntityManagerMock,
            $this->productListCustomerRelationReaderMock
        );
    }

    /**
     * @return void
     */
    public function testDeleteProductListCustomerRelation(): void
    {
        $this->productListCustomerEntityManagerMock->expects($this->atLeastOnce())
            ->method('deleteProductListCustomerRelations')
            ->with($this->productListTransferMock);

        $this->productListCustomerRelationWriter->deleteProductListCustomerRelation($this->productListTransferMock);
    }

    /**
     * @return void
     */
    public function testExecuteSaveProductListCustomerRelationTransaction(): void
    {
        $productListId = 1;

        $relatedCustomerIds = [1, 2, 3];
        $requestedCustomerIds = [1, 3, 4];
        $saveCustomerIds = [2 => 4];
        $deleteCustomerIds = [1 => 2];
        $customerIds = [1, 3, 4];

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('requireIdProductList');

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn($productListId);

        $this->productListCustomerRelationReaderMock->expects($this->atLeastOnce())
            ->method('getProductListCustomerRelation')
            ->with($this->productListCustomerRelationTransferMock)
            ->willReturn($this->currentProductListCustomerRelationTransferMock);

        $this->currentProductListCustomerRelationTransferMock->expects($this->at(0))
            ->method('getCustomerIds')
            ->willReturn($relatedCustomerIds);

        $this->currentProductListCustomerRelationTransferMock->expects($this->at(1))
            ->method('getCustomerIds')
            ->willReturn($customerIds);

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('getCustomerIds')
            ->willReturn($requestedCustomerIds);

        $this->productListCustomerEntityManagerMock->expects($this->atLeastOnce())
            ->method('addCustomerRelations')
            ->with($productListId, $saveCustomerIds);

        $this->productListCustomerEntityManagerMock->expects($this->atLeastOnce())
            ->method('removeCustomerRelations')
            ->with($productListId, $deleteCustomerIds);

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('setCustomerIds')
            ->with($customerIds)
            ->willReturn($this->productListCustomerRelationTransferMock);

        try {
            $reflection = new ReflectionClass(\get_class($this->productListCustomerRelationWriter));

            $method = $reflection->getMethod('executeSaveProductListCustomerRelationTransaction');
            $method->setAccessible(true);

            $method->invokeArgs($this->productListCustomerRelationWriter, [$this->productListCustomerRelationTransferMock]);
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }
    }
}