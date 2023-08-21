<?php

namespace Modules\Department\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Modules\Department\src\Models\Department;
use Modules\Department\src\Http\Requests\DepartmentRequest;
use Modules\Department\src\Repositories\DepartmentRepositoryInterface;

class DepartmentController extends Controller
{
    protected $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', Constant::DEFAULT_LIMIT);
        $data = $this->departmentRepository->getAll()->paginate($limit);
        return Helper::jsonResponse(Constant::SUCCESS, "", [
            "departments" => $data,
        ]);
    }

    public function store(DepartmentRequest $departmentRequest)
    {
        $data = $departmentRequest->except(['_token']);
        $department = Department::create($data);
        if($department) {
            return Helper::jsonResponse(Constant::SUCCESS, __('department::messages.create.success'), $department);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('department::messages.create.failure'), $department);
    }

    public function update(DepartmentRequest $departmentRequest, $id)
    {
        $data = $departmentRequest->except(['_token']);
        $department = $this->departmentRepository->update($id,$data);
        if($department) {
            return Helper::jsonResponse(Constant::SUCCESS, __('department::messages.update.success'), $department);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('department::messages.update.failure'), $department);
    }

    public function destroy($id)
    {
        $course = $this->departmentRepository->delete($id);
        return Helper::jsonResponse(Constant::SUCCESS, __('department::messages.delete.success'));
    }
}
