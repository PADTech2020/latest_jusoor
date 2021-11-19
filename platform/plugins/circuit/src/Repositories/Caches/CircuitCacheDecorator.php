<?php

namespace Botble\Circuit\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\Circuit\Repositories\Interfaces\CircuitInterface;

class CircuitCacheDecorator extends CacheAbstractDecorator implements CircuitInterface
{

    /**
     * {@inheritDoc}
     */
    public function getCircuits(array $select, array $orderBy)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getAllCircuitsWithChildren(array $condition = [], array $with = [], array $select = ['*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
