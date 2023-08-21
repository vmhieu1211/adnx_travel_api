<?php

namespace Modules\Request\src\Repositories;

use App\Repositories\RepositoryInterface;

interface RequestRepositoryInterface extends RepositoryInterface{

    public function getRequests();
}
