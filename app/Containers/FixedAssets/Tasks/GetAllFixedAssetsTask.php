<?php

namespace App\Containers\FixedAssets\Tasks;

use App\Containers\FixedAssets\Data\Repositories\FixedAssetsRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllFixedAssetsTask extends Task
{

    protected $repository;

    public function __construct(FixedAssetsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
