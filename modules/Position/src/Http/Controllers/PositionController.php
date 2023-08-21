<?php

namespace Modules\Position\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Modules\Position\src\Models\Position;
use Modules\Position\src\Http\Requests\PositionRequest;
use Modules\Position\src\Repositories\PositionRepositoryInterface;

class PositionController extends Controller
{
    protected $positionRepository;

    public function __construct(PositionRepositoryInterface $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', Constant::DEFAULT_LIMIT);
        $data = $this->positionRepository->getAll()->paginate($limit);
        return Helper::jsonResponse(Constant::SUCCESS, "", [
            "positions" => $data,
        ]);
    }

    public function store(PositionRequest $positionRequest)
    {
        $data = $positionRequest->except(['_token']);
        $position = Position::create($data);
        if($position) {
            return Helper::jsonResponse(Constant::SUCCESS, __('position::messages.create.success'), $position);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('position::messages.create.failure'), $position);
    }

    public function update(PositionRequest $positionRequest, $id)
    {
        $data = $positionRequest->except(['_token']);
        $position = $this->positionRepository->update($id,$data);
        if($position) {
            return Helper::jsonResponse(Constant::SUCCESS, __('position::messages.update.success'), $position);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('position::messages.update.failure'), $position);
    }

    public function destroy($id)
    {
        $course = $this->positionRepository->delete($id);
        return Helper::jsonResponse(Constant::SUCCESS, __('position::messages.delete.success'));
    }
}
