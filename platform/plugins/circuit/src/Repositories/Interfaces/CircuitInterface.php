<?php

namespace Botble\Circuit\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface CircuitInterface extends RepositoryInterface
{
    /**
     * @param array $select
     * @param array $orderBy
     * @return Collection
     */
    public function getCircuits(array $select, array $orderBy);

    /**
     * @param array $condition
     * @param array $with
     * @param array $select
     * @return mixed
     */
    public function getAllCircuitsWithChildren(array $condition = [], array $with = [], array $select = ['*']);
}
