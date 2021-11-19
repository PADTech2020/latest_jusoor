<?php

namespace Botble\Partners\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Partners\Repositories\Interfaces\PartnersInterface;

class PartnersRepository extends RepositoriesAbstract implements PartnersInterface
{
    public function getPartners( $limit = 5,  $with = [])
    {
        $data = $this->model->where(['partners.status' => BaseStatusEnum::PUBLISHED]);

        $data = $data->limit($limit)
            
            ->select('partners.*')
            ->orderBy('partners.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
