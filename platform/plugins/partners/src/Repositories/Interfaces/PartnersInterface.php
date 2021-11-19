<?php

namespace Botble\Partners\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;

interface PartnersInterface extends RepositoryInterface
{
    public function getPartners( $limit = 5, array $with = []);
}
