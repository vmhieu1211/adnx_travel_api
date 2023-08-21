<?php

namespace Modules\Position\src\Repositories;

use Modules\Position\src\Models\Position;
use App\Repositories\BaseRepository;
use Modules\Position\src\Repositories\PositionRepositoryInterface;


class PositionRepository extends BaseRepository implements PositionRepositoryInterface
{
    public function getModel() {
        return Position::class;
    }

    public function getPositions($limit=10){
        return $this->model->limit($limit)->get();
    }
}
