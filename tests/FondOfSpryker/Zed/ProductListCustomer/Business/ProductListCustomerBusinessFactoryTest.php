<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReader;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriter;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReader;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListTransferExpander;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManager;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepository;
use FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerDependencyProvider;
use FondOfSpryker\Zed\ProductListCustomerExtension\Dependency\Plugin\ProductListCustomerPostSavePluginInterface;
use Spryker\Zed\Kernel\Container;

class ProductListCustomerBusinessFactoryTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $containerMock;

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
     * @var \FondOfSpryker\Zed\ProductListCustomerExtension\Dependency\Plugin\ProductListCustomerPostSavePluginInterface[]|\PHPUnit\Framework\MockObject\MockObject[]
     */
    protected $productListCustomerPostSavePluginMocks;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->repositoryMock = $this->getMockBuilder(ProductListCustomerRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(ProductListCustomerEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerPostSavePluginMocks = [
            $this->getMockBuilder(ProductListCustomerPostSavePluginInterface::class)
                ->disableOriginalConstructor()
                ->getMock(),
        ];

        $this->productListCustomerBusinessFactory = new ProductListCustomerBusinessFactory();

        $this->productListCustomerBusinessFactory->setContainer($this->containerMock);
        $this->productListCustomerBusinessFactory->setRepository($this->repositoryMock);
        $this->productListCustomerBusinessFactory->setEntityManager($this->entityManagerMock);
    }

    /**
     * @return void
     */
    public function testCreateProductListReader(): void
    {
        $productListReader = $this->productListCustomerBusinessFactory->createProductListReader();
        $this->assertInstanceOf(ProductListReader::class, $productListReader);
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
        $this->assertInstanceOf(CustomerExpander::class, $customerExpander);
    }

    /**
     * @return void
     */
    public function testCreateProductListCustomerRelationWriter(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->with(ProductListCustomerDependencyProvider::PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE)
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(ProductListCustomerDependencyProvider::PLUGINS_PRODUCT_LIST_CUSTOMER_RELATION_POST_SAVE)
            ->willReturn($this->productListCustomerPostSavePluginMocks);

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
