<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepository;

class ProductListCustomerBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Business\ProductListCustomerBusinessFactory
     */
    protected $productListCustomerBusinessFactory;

    /**
     * @var \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepository
     */
    protected $repositoryMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->repositoryMock = $this->getMockBuilder(ProductListCustomerRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productListCustomerBusinessFactory = new ProductListCustomerBusinessFactory();

        $this->productListCustomerBusinessFactory->setRepository($this->repositoryMock);
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
        $customerExpander = $this->productListCustomerBusinessFactory->createCustomerExpander();
        $this->assertInstanceOf(CustomerExpanderInterface::class, $customerExpander);
    }
}
