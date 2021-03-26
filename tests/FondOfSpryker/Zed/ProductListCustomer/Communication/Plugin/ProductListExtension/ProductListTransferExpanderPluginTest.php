<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListTransferExpanderPluginTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Communication\Plugin\ProductListExtension\CustomerProductListTransferExpanderPlugin
     */
    protected $productListTransferExpanderPlugin;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerFacade;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productListTransferMock = $this->getMockBuilder(ProductListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacade = $this->getMockBuilder(ProductListCustomerFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListTransferExpanderPlugin = new CustomerProductListTransferExpanderPlugin();

        $this->productListTransferExpanderPlugin->setFacade($this->productListCustomerFacade);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->productListCustomerFacade->expects($this->atLeastOnce())
            ->method('expandProductListTransferWithProductListCustomerRelationTransfer')
            ->with($this->productListTransferMock)
            ->willReturn($this->productListTransferMock);

        $actualProductListTransfer = $this->productListTransferExpanderPlugin
            ->expandTransfer($this->productListTransferMock);

        $this->assertEquals($this->productListTransferMock, $actualProductListTransfer);
    }
}
