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
class CustomerProductListCollectionTransfer extends AbstractTransfer
{
    const BLACKLIST_IDS = 'blacklistIds';

    const WHITELIST_IDS = 'whitelistIds';

    /**
     * @var int[]
     */
    protected $blacklistIds;

    /**
     * @var int[]
     */
    protected $whitelistIds;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'blacklist_ids' => 'blacklistIds',
        'blacklistIds' => 'blacklistIds',
        'BlacklistIds' => 'blacklistIds',
        'whitelist_ids' => 'whitelistIds',
        'whitelistIds' => 'whitelistIds',
        'WhitelistIds' => 'whitelistIds',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::BLACKLIST_IDS => [
            'type' => 'int[]',
            'name_underscore' => 'blacklist_ids',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::WHITELIST_IDS => [
            'type' => 'int[]',
            'name_underscore' => 'whitelist_ids',
            'is_collection' => false,
            'is_transfer' => false,
        ],
    ];

    /**
     * @module ProductList
     *
     * @param int[]|null $blacklistIds
     *
     * @return $this
     */
    public function setBlacklistIds(?array $blacklistIds = null)
    {
        if ($blacklistIds === null) {
            $blacklistIds = [];
        }

        $this->blacklistIds = $blacklistIds;
        $this->modifiedProperties[self::BLACKLIST_IDS] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return int[]
     */
    public function getBlacklistIds()
    {
        return $this->blacklistIds;
    }

    /**
     * @module ProductList
     *
     * @param int $blacklistId
     *
     * @return $this
     */
    public function addBlacklistId($blacklistId)
    {
        $this->blacklistIds[] = $blacklistId;
        $this->modifiedProperties[self::BLACKLIST_IDS] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return $this
     */
    public function requireBlacklistIds()
    {
        $this->assertPropertyIsSet(self::BLACKLIST_IDS);

        return $this;
    }

    /**
     * @module ProductList
     *
     * @param int[]|null $whitelistIds
     *
     * @return $this
     */
    public function setWhitelistIds(?array $whitelistIds = null)
    {
        if ($whitelistIds === null) {
            $whitelistIds = [];
        }

        $this->whitelistIds = $whitelistIds;
        $this->modifiedProperties[self::WHITELIST_IDS] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return int[]
     */
    public function getWhitelistIds()
    {
        return $this->whitelistIds;
    }

    /**
     * @module ProductList
     *
     * @param int $whitelistId
     *
     * @return $this
     */
    public function addWhitelistId($whitelistId)
    {
        $this->whitelistIds[] = $whitelistId;
        $this->modifiedProperties[self::WHITELIST_IDS] = true;

        return $this;
    }

    /**
     * @module ProductList
     *
     * @return $this
     */
    public function requireWhitelistIds()
    {
        $this->assertPropertyIsSet(self::WHITELIST_IDS);

        return $this;
    }
}
