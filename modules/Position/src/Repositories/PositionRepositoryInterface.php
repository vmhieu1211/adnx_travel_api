<?php

namespace Modules\Position\src\Repositories;

use App\Repositories\RepositoryInterface;

interface PositionRepositoryInterface extends RepositoryInterface{

    public function getPositions();
}
