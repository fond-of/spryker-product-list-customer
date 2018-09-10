<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReader;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriter;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriterInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReader;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
 * @method \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\ProductListCustomer\Persistence\ProductListCustomerEntityManagerInterface getEntityManager()
 */
class ProductListCustomerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface
     */
    public function createProductListReader(): ProductListReaderInterface
    {
        return new ProductListReader($this->getRepository());
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpanderInterface
     */
    public function createCustomerExpander(): CustomerExpanderInterface
    {
        return new CustomerExpander($this->createProductListReader());
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationWriterInterface
     */
    public function createProductListCustomerRelationWriter(): ProductListCustomerRelationWriterInterface
    {
        return new ProductListCustomerRelationWriter(
            $this->getEntityManager(),
            $this->createProductListCustomerRelationReader()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListCustomerRelationReaderInterface
     */
    public function createProductListCustomerRelationReader(): ProductListCustomerRelationReaderInterface
    {
        return new ProductListCustomerRelationReader($this->getRepository());
    }
}
