<?php

namespace Modules\Customer\src\Repositories;

use Modules\Customer\src\Models\Customer;
use App\Repositories\BaseRepository;
use Modules\Customer\src\Repositories\CustomerRepositoryInterface;


class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    public function getModel() {
        return Customer::class;
    }

    public function getCustomers($limit=10){
        return $this->model->limit($limit)->get();
    }
}
