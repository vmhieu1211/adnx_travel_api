<?php

namespace Modules\Department\src\Repositories;

use Modules\Department\src\Models\Department;
use App\Repositories\BaseRepository;
use Modules\Department\src\Repositories\DepartmentRepositoryInterface;


class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    public function getModel() {
        return Department::class;
    }

    public function getDepartments($limit=10){
        return $this->model->limit($limit)->get();
    }
}
