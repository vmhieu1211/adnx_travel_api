<?php

namespace Modules\Department\src\Repositories;

use App\Repositories\RepositoryInterface;

interface DepartmentRepositoryInterface extends RepositoryInterface{

    public function getDepartments();
}
