<?php

namespace Botble\Circuit\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Circuit\Repositories\Interfaces\CircuitInterface;

class CircuitRepository extends RepositoriesAbstract implements CircuitInterface
{
    /**
     * {@inheritDoc}
     */
    public function getCircuits(array $select, array $orderBy)
    {
        $data = $this->model->select($select);
        foreach ($orderBy as $by => $direction) {
            $data = $data->orderBy($by, $direction);
        }

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getAllCircuitsWithChildren(array $condition = [], array $with = [], array $select = ['*'])
    {
        $data = $this->model
            ->where($condition)
            ->with($with)
            ->select($select);

        return $this->applyBeforeExecuteQuery($data)->get();
    }


}
