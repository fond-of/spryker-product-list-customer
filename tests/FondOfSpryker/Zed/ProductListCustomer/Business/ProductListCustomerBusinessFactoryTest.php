<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReader;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriter;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListTransferExpander;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManager;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepository;

class ProductListCustomerBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerBusinessFactory
     */
    protected $productListCustomerBusinessFactory;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepository|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $repositoryMock;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManager|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $entityManagerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->repositoryMock = $this->getMockBuilder(ProductListCustomerRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(ProductListCustomerEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerBusinessFactory = new ProductListCustomerBusinessFactory();

        $this->productListCustomerBusinessFactory->setRepository($this->repositoryMock);
        $this->productListCustomerBusinessFactory->setEntityManager($this->entityManagerMock);
    }

    /**
     * @return void
     */
    public function testCreateProductListReader(): void
    {
        $productListReader = $this->productListCustomerBusinessFactory->createProductListReader();
        $this->assertInstanceOf(ProductListReaderInterface::class, $productListReader);
    }

    /**
     * @return void
     */
    public function testCreateCustomerExpander(): void
    {
        $productListTransferExpander = $this->productListCustomerBusinessFactory->createProductListTransferExpander();
        $this->assertInstanceOf(ProductListTransferExpander::class, $productListTransferExpander);
    }

    /**
     * @return void
     */
    public function testCreateProductListTransferExpander(): void
    {
        $customerExpander = $this->productListCustomerBusinessFactory->createCustomerExpander();
        $this->assertInstanceOf(CustomerExpanderInterface::class, $customerExpander);
    }

    /**
     * @return void
     */
    public function testCreateProductListCustomerRelationWriter(): void
    {
        $productListCustomerRelationWriter = $this->productListCustomerBusinessFactory
            ->createProductListCustomerRelationWriter();
        $this->assertInstanceOf(ProductListCustomerRelationWriter::class, $productListCustomerRelationWriter);
    }

    /**
     * @return void
     */
    public function testCreateProductListCustomerRelationReader(): void
    {
        $productListCustomerRelationReader = $this->productListCustomerBusinessFactory
            ->createProductListCustomerRelationReader();
        $this->assertInstanceOf(ProductListCustomerRelationReader::class, $productListCustomerRelationReader);
    }
}
