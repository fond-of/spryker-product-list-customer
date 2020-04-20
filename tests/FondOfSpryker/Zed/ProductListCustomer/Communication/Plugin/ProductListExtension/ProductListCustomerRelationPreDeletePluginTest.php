<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;
use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListCustomerRelationPreDeletePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListExtension\ProductListCustomerRelationPreDeletePlugin
     */
    protected $productListCustomerRelationPreDeleterPlugin;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerFacadeMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCustomerRelationTransfer'|\PHPUnit\Framework\MockObject\MockObject
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

        $this->productListCustomerRelationPreDeleterPlugin = new ProductListCustomerRelationPreDeletePlugin();

        $this->productListCustomerRelationPreDeleterPlugin->setFacade($this->productListCustomerFacadeMock);
    }

    /**
     * @return void
     */
    public function testPreDelete(): void
    {
        $this->productListCustomerFacadeMock->expects($this->atLeastOnce())
            ->method('deleteProductListCustomerRelation')
            ->with($this->productListTransferMock);

        $this->productListCustomerRelationPreDeleterPlugin->execute($this->productListTransferMock);
    }
}
