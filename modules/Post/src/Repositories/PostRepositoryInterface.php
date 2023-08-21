<?php

namespace Modules\Post\src\Repositories;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface{

    public function getPosts();
}
