<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CustomerTransfer;

class CustomerExpanderTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\ProductListTransfer[]|\PHPUnit\Framework\MockObject\MockObject[]
     */
    protected $productListsMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListReaderMock;

    /**
     * @var \Generated\Shared\Transfer\ProductListCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productListCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer
     */
    protected $customerTransfer;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpanderInterface
     */
    protected $customerExpander;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->customerTransfer = new CustomerTransfer();

        $this->productListReaderMock = $this->getMockBuilder(ProductListReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListsMock = [
            $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
                ->disableOriginalConstructor()
                ->setMethods(['getType', 'getIdProductList'])
                ->getMock(),
            $this->getMockBuilder('\Generated\Shared\Transfer\ProductListTransfer')
                ->disableOriginalConstructor()
                ->setMethods(['getType', 'getIdProductList'])
                ->getMock(),
        ];

        $this->productListCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductListCollectionTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getProductLists'])
            ->getMock();

        $this->customerExpander = new CustomerExpander($this->productListReaderMock);
    }

    /**
     * @return void
     */
    public function test(): void
    {
        $this->productListReaderMock->expects($this->atLeastOnce())
            ->method('getProductListCollectionByIdCustomerId')
            ->with($this->customerTransfer)
            ->willReturn($this->productListCollectionTransferMock);

        $this->productListCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getProductLists')
            ->willReturn($this->productListsMock);

        $this->productListsMock[0]->expects($this->atLeastOnce())
            ->method('getType')
            ->willReturn('whitelist');

        $this->productListsMock[0]->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn(1);

        $this->productListsMock[1]->expects($this->atLeastOnce())
            ->method('getType')
            ->willReturn('blacklist');

        $this->productListsMock[1]->expects($this->atLeastOnce())
            ->method('getIdProductList')
            ->willReturn(2);

        $this->customerExpander->expandCustomerTransferWithProductListIds($this->customerTransfer);
    }
}
