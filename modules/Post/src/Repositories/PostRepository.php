<?php

namespace Modules\Post\src\Repositories;

use Modules\Post\src\Models\Post;
use App\Repositories\BaseRepository;
use Modules\Post\src\Repositories\PostRepositoryInterface;


class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel() {
        return Post::class;
    }

    public function getPosts($limit=10){
        return $this->model->limit($limit)->get();
    }
}
