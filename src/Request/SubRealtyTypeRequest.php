<?php

namespace Justimmo\Api\Request;

use Justimmo\Api\Entity\SubRealtyType;

/**
 * @method $this filterByWithRealties($value)
 * @method $this filterByRealtyType($value)
 * @method $this sortByName($direction = BaseApiRequest::ASC)
 */
class SubRealtyTypeRequest extends BaseApiRequest
{
    const FIELD_REALTY_TYPE = 'realtyType';

    const FILTERS = [
        'withRealties',
        'realtyType',
    ];

    const SORTS = [
        'name',
    ];

    /**
     * @inheritDoc
     */
    public function getPathPrefix()
    {
        return '/sub-realty-types';
    }

    /**
     * @inheritDoc
     */
    public function getEntityClass()
    {
        return SubRealtyType::class;
    }
}
