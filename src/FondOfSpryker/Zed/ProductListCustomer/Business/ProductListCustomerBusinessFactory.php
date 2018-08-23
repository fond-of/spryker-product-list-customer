<?php

namespace FondOfSpryker\Zed\ProductListCustomer\Business;

use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpander;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\CustomerExpanderInterface;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReader;
use FondOfSpryker\Zed\ProductListCustomer\Business\Model\ProductListReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ProductListCustomer\ProductListCustomerConfig getConfig()
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
}
