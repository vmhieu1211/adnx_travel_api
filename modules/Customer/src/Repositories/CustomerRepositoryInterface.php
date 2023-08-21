<?php

namespace Modules\Customer\src\Repositories;

use App\Repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface{

    public function getCustomers();
}
