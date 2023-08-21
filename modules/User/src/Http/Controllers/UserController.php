<?php

namespace Modules\User\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\User\src\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', Constant::DEFAULT_LIMIT);
        $data = $this->userRepository->getAll()->paginate($limit);
        return Helper::jsonResponse(Constant::SUCCESS, "", [
            "users" => $data,
        ]);
    }

    public function store(UserRequest $userRequest)
    {
        $data = $userRequest->except(['_token']);
        $user = User::create($data);
        if($user) {
            return Helper::jsonResponse(Constant::SUCCESS, __('user::messages.create.success'), $user);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('user::messages.create.failure'), $user);
    }

    public function update(UserRequest $userRequest, $id)
    {
        $data = $userRequest->except(['_token']);
        $user = $this->userRepository->update($id,$data);
        if($user) {
            return Helper::jsonResponse(Constant::SUCCESS, __('user::messages.update.success'), $user);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('user::messages.update.failure'), $user);
    }

    public function destroy($id)
    {
        $course = $this->userRepository->delete($id);
        return Helper::jsonResponse(Constant::SUCCESS, __('user::messages.delete.success'));
    }
}
