<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use ArrayObject;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class CustomerTransfer extends AbstractTransfer
{
    const PRODUCT_LIST_COLLECTION = 'productListCollection';

    /**
     * @var \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null
     */
    protected $productListCollection;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'product_list_collection' => 'productListCollection',
        'productListCollection' => 'productListCollection',
        'ProductListCollection' => 'productListCollection',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::PRODUCT_LIST_COLLECTION => [
            'type' => 'Generated\Shared\Transfer\CustomerProductListCollectionTransfer',
            'name_underscore' => 'product_list_collection',
            'is_collection' => false,
            'is_transfer' => true,
        ],
    ];

    /**
     * @module ProductList
     *
     * @param \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null $productListCollection
     *
     * @return $this
     */
    public function setProductListCollection(CustomerProductListCollectionTransfer $productListCollection = null)
    {
        $this->productListCollection = $productListCollection;
        $this->modifiedProperties[self::PRODUCT_LIST_COLLECTION] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return \Generated\Shared\Transfer\CustomerProductListCollectionTransfer|null
     */
    public function getProductListCollection()
    {
        return $this->productListCollection;
    }

    /**
     * @module ProductList
     *
     * @return $this
     */
    public function requireProductListCollection()
    {
        $this->assertPropertyIsSet(self::PRODUCT_LIST_COLLECTION);

        return $this;
    }
}
