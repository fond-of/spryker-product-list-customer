<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class CustomerTransfer extends AbstractTransfer
{
    public const CUSTOMER_PRODUCT_LIST_COLLECTION = 'customerProductListCollection';

    /**
     * @var \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null
     */
    protected $customerProductListCollection;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'customer_product_list_collection' => 'customerProductListCollection',
        'customerProductListCollection' => 'customerProductListCollection',
        'CustomerProductListCollection' => 'customerProductListCollection',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::CUSTOMER_PRODUCT_LIST_COLLECTION => [
            'type' => 'Generated\Shared\Transfer\CustomerProductListCollectionTransfer',
            'name_underscore' => 'customer_product_list_collection',
            'is_collection' => false,
            'is_transfer' => true,
        ],
    ];


    /**
     * @module ProductList
     *
     * @param \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null $customerProductListCollection
     *
     * @return $this
     */
    public function setCustomerProductListCollection(?CustomerProductListCollectionTransfer $customerProductListCollection = null)
    {
        $this->customerProductListCollection = $customerProductListCollection;
        $this->modifiedProperties[self::CUSTOMER_PRODUCT_LIST_COLLECTION] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null
     */
    public function getCustomerProductListCollection(): ?CustomerProductListCollectionTransfer
    {
        return $this->customerProductListCollection;
    }

    /**
     * @module ProductList
     *
     * @return $this
     */
    public function requireCustomerProductListCollection(): self
    {
        $this->assertPropertyIsSet(self::CUSTOMER_PRODUCT_LIST_COLLECTION);

        return $this;
    }
}
