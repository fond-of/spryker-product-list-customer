<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriter;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListTransferExpander;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductListCustomerRelationTransfer;
use Generated\Shared\Transfer\ProductListTransfer;

class ProductListCustomerFacadeTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $customerExpanderMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerBusinessFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerBusinessFactoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerFacadeInterface
     */
    protected $productListCustomerFacade;

    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriter|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRelationWriterMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCustomerRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCustomerRelationTransferMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListTransferExpanderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListTransferExpander;

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

        $this->productListCustomerRelationWriterMock = $this->getMockBuilder(ProductListCustomerRelationWriter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerTransferMock = $this->getMockBuilder(CustomerTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->customerExpanderMock = $this->getMockBuilder(CustomerExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListTransferExpander = $this->getMockBuilder(ProductListTransferExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerBusinessFactoryMock = $this->getMockBuilder(ProductListCustomerBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerFacade = new ProductListCustomerFacade();

        $this->productListCustomerFacade->setFactory($this->productListCustomerBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCustomerTransferWithProductListIds(): void
    {
        $this->productListCustomerBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCustomerExpander')
            ->willReturn($this->customerExpanderMock);

        $this->customerExpanderMock->expects($this->atLeastOnce())
            ->method('expandCustomerTransferWithProductListIds')
            ->willReturn($this->customerTransferMock);

        $actualCustomerTransfer = $this->productListCustomerFacade->expandCustomerTransferWithProductListIds($this->customerTransferMock);

        $this->assertEquals($this->customerTransferMock, $actualCustomerTransfer);
    }

    /**
     * @return void
     */
    public function testSaveProductListCustomerRelation(): void
    {
        $this->productListCustomerBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductListCustomerRelationWriter')
            ->willReturn($this->productListCustomerRelationWriterMock);

        $this->productListCustomerRelationWriterMock->expects($this->atLeastOnce())
            ->method('saveProductListCustomerRelation')
            ->with($this->productListCustomerRelationTransferMock)
            ->willReturn($this->productListCustomerRelationTransferMock);

        $productListCustomerRelationTransfer = $this->productListCustomerFacade->saveProductListCustomerRelation($this->productListCustomerRelationTransferMock);

        $this->assertEquals($this->productListCustomerRelationTransferMock, $productListCustomerRelationTransfer);
    }

    /**
     * @return void
     */
    public function testDeleteProductListCustomerRelation(): void
    {
        $this->productListCustomerBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductListCustomerRelationWriter')
            ->willReturn($this->productListCustomerRelationWriterMock);

        $this->productListCustomerRelationWriterMock->expects($this->atLeastOnce())
            ->method('deleteProductListCustomerRelation')
            ->with($this->productListTransferMock);

        $this->productListCustomerFacade->deleteProductListCustomerRelation($this->productListTransferMock);
    }

    /**
     * @return void
     */
    public function testExpandProductListTransferWithProductListCustomerRelationTransfer(): void
    {
        $this->productListCustomerBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductListTransferExpander')
            ->willReturn($this->productListTransferExpander);

        $this->productListTransferExpander->expects($this->atLeastOnce())
            ->method('expandWithProductListCustomerRelationTransfer')
            ->with($this->productListTransferMock)
            ->willReturn($this->productListTransferMock);

        $actualProductList = $this->productListCustomerFacade
            ->expandProductListTransferWithProductListCustomerRelationTransfer($this->productListTransferMock);

        $this->assertEquals($actualProductList, $this->productListTransferMock);
    }
}
