<?php

namespace Modules\Customer\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Modules\Customer\src\Models\Customer;
use Modules\Customer\src\Http\Requests\CustomerRequest;
use Modules\Customer\src\Repositories\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', Constant::DEFAULT_LIMIT);
        $data = $this->customerRepository->getAll()->paginate($limit);
        return Helper::jsonResponse(Constant::SUCCESS, "", [
            "customers" => $data,
        ]);
    }

    public function store(CustomerRequest $customerRequest)
    {
        $data = $customerRequest->except(['_token']);
        $customer = Customer::create($data);
        if($customer) {
            return Helper::jsonResponse(Constant::SUCCESS, __('customer::messages.create.success'), $customer);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('customer::messages.create.failure'), $customer);
    }

    public function update(CustomerRequest $customerRequest, $id)
    {
        $data = $customerRequest->except(['_token']);
        $customer = $this->customerRepository->update($id,$data);
        if($customer) {
            return Helper::jsonResponse(Constant::SUCCESS, __('customer::messages.update.success'), $customer);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('customer::messages.update.failure'), $customer);
    }

    public function destroy($id)
    {
        $course = $this->customerRepository->delete($id);
        return Helper::jsonResponse(Constant::SUCCESS, __('customer::messages.delete.success'));
    }
}
