<?php

namespace Justimmo\Api\Tests\Request;


use Justimmo\Api\Entity\RealtyType;
use Justimmo\Api\Request\RealtyTypeRequest;

class RealtyTypeRequestTest extends RequestTestCase
{
    const ENTITY_CLASS = RealtyType::class;

    const PATH_PREFIX = '/realty-types';

    const SORTS = [
        'name',
    ];

    const FILTERS = [
        'withRealties',
    ];

    /**
     * @inheritdoc
     */
    protected function getRequest()
    {
        return new RealtyTypeRequest();
    }
}
