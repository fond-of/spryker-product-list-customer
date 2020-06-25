<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;
use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListCustomerRelationPostSaverPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListCustomerRelationPostSaverPlugin
     */
    protected $productListCustomerRelationPostSaverPlugin;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerFacadeMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRelationTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListTransferMock = $this->getMockBuilder(ProductListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerRelationTransferMock = $this->getMockBuilder(ProductListCustomerRelationTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacadeMock = $this->getMockBuilder(ProductListCustomerFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerRelationPostSaverPlugin = new ProductListCustomerRelationPostSaverPlugin();

        $this->productListCustomerRelationPostSaverPlugin->setFacade($this->productListCustomerFacadeMock);
    }

    /**
     * @return void
     */
    public function testPostSaveWithoutProductListCustomerRelation(): void
    {
        $productListId = 1;

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('getProductListCustomerRelation')
            ->willReturn(null);

        $this->productListCustomerRelationTransferMock->expects($this->never())
            ->method('setIdProductList')
            ->with($productListId);

        $this->productListTransferMock->expects($this->never())
            ->method('getIdProductList')
            ->willReturn($productListId);

        $this->productListCustomerFacadeMock->expects($this->never())
            ->method('saveProductListCustomerRelation')
            ->with($this->productListCustomerRelationTransferMock)
            ->willReturn($this->productListCustomerRelationTransferMock);

        $this->productListTransferMock->expects($this->never())
            ->method('setProductListCustomerRelation')
            ->with($this->productListCustomerRelationTransferMock);

        $productListTransferMock = $this->productListCustomerRelationPostSaverPlugin->postSave($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $productListTransferMock);
    }

    /**
     * @return void
     */
    public function testPostSave(): void
    {
        $productListId = 1;

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('getProductListCustomerRelation')
            ->willReturn($this->productListCustomerRelationTransferMock);

        $this->productListCustomerRelationTransferMock->expects($this->atLeastOnce())
            ->method('setIdProductList')
            ->with($productListId);

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn($productListId);

        $this->productListCustomerFacadeMock->expects($this->atLeastOnce())
            ->method('saveProductListCustomerRelation')
            ->with($this->productListCustomerRelationTransferMock)
            ->willReturn($this->productListCustomerRelationTransferMock);

        $this->productListTransferMock->expects($this->atLeastOnce())
            ->method('setProductListCustomerRelation')
            ->with($this->productListCustomerRelationTransferMock);

        $productListTransferMock = $this->productListCustomerRelationPostSaverPlugin->postSave($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $productListTransferMock);
    }
}
