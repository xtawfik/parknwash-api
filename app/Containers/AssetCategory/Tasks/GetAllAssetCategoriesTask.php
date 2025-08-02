<?php

namespace App\Containers\AssetCategory\Tasks;

use App\Containers\AssetCategory\Data\Repositories\AssetCategoryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAssetCategoriesTask extends Task
{

    protected $repository;

    public function __construct(AssetCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
