<?php

namespace Justimmo\Api\Tests\Request;

use Justimmo\Api\Entity\FederalState;
use Justimmo\Api\Request\FederalStateRequest;

class FederalStateRequestTest extends RequestTestCase
{
    const ENTITY_CLASS = FederalState::class;

    const PATH_PREFIX = '/federal-states';

    const FIELDS = [
        'country',
    ];

    const FILTERS = [
        'withRealties',
        'country',
    ];

    const SORTS = [
        'name',
    ];

    /**
     * @inheritdoc
     */
    protected function getRequest()
    {
        return new FederalStateRequest();
    }
}
