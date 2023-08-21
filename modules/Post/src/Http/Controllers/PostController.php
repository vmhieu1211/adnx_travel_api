<?php

namespace Modules\Post\src\Http\Controllers;

use App\Helper;
use App\Constant;
use Illuminate\Http\Request;
use Modules\Post\src\Models\Post;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Modules\Post\src\Http\Requests\PostRequest;
use Modules\Post\src\Repositories\PostRepositoryInterface;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit', Constant::DEFAULT_LIMIT);
        $data = $this->postRepository->getAll()->paginate($limit);
        return Helper::jsonResponse(Constant::SUCCESS, "", [
            "posts" => $data,
        ]);
    }

    public function store(PostRequest $postRequest)
    {
        $data = $postRequest->except(['_token']);
        $post = Post::create($data);
        if($post) {
            return Helper::jsonResponse(Constant::SUCCESS, __('post::messages.create.success'), $post);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('post::messages.create.failure'), $post);
    }

    public function update(PostRequest $postRequest, $id)
    {
        $data = $postRequest->except(['_token']);
        $post = $this->postRepository->update($id,$data);
        if($post) {
            return Helper::jsonResponse(Constant::SUCCESS, __('post::messages.update.success'), $post);
        }
        return Helper::jsonResponse(Constant::SUCCESS, __('post::messages.update.failure'), $post);
    }

    public function destroy($id)
    {
        $course = $this->postRepository->delete($id);
        return Helper::jsonResponse(Constant::SUCCESS, __('post::messages.delete.success'));
    }
}
