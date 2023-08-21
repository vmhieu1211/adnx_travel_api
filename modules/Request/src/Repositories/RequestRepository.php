<?php

namespace Modules\Request\src\Repositories;

use Modules\Request\src\Models\Request;
use App\Repositories\BaseRepository;
use Modules\Request\src\Repositories\RequestRepositoryInterface;


class RequestRepository extends BaseRepository implements RequestRepositoryInterface
{
    public function getModel() {
        return Request::class;
    }

    public function getRequests($limit=10){
        return $this->model->limit($limit)->get();
    }
}
