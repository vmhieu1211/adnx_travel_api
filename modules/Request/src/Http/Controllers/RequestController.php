<?php

namespace Modules\Request\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Illuminate\Http\Request;
use Modules\Request\src\Models\Request as ModelsRequest;
use App\Http\Controllers\Controller;
use Modules\Request\src\Http\Requests\Requests;
use Modules\Request\src\Repositories\RequestRepository;

class RequestController extends Controller
{
    protected $requestRepository;

    public function __construct(RequestRepository $requestRepository)
    {
        $this->requestRepository = $requestRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', Constant::DEFAULT_LIMIT);
        $data = $this->requestRepository->getAll()->paginate($limit);
        return Helper::jsonResponse(Constant::SUCCESS, "", [
            "requests" => $data,
        ]);
    }

    public function store(Requests $request)
    {
        $data = $request->except(['_token']);
        $request = ModelsRequest::create($data);
        if($request) {
            return Helper::jsonResponse(Constant::SUCCESS, __('request::messages.create.success'), $request);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('request::messages.create.failure'), $request);
    }

    public function update(Requests $request, $id)
    {
        $data = $request->except(['_token']);
        $request = $this->requestRepository->update($id,$data);
        if($request) {
            return Helper::jsonResponse(Constant::SUCCESS, __('request::messages.update.success'), $request);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('request::messages.update.failure'), $request);
    }

    public function destroy($id)
    {
        $course = $this->requestRepository->delete($id);
        return Helper::jsonResponse(Constant::SUCCESS, __('request::messages.delete.success'));
    }
}
