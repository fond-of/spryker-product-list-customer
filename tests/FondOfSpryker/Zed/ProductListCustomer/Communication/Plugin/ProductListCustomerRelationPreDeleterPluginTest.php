<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;

class ProductListCustomerRelationPreDeleterPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListCustomerRelationPreDeleterPlugin
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
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCustomerRelationTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacadeMock = $this->getMockBuilder(ProductListCustomerFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerRelationPreDeleterPlugin = new ProductListCustomerRelationPreDeleterPlugin();

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

        $this->productListCustomerRelationPreDeleterPlugin->preDelete($this->productListTransferMock);
    }
}
