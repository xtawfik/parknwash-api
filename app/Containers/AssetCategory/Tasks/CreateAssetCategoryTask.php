<?php

namespace App\Containers\AssetCategory\Tasks;

use App\Containers\AssetCategory\Data\Repositories\AssetCategoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAssetCategoryTask extends Task
{

    protected $repository;

    public function __construct(AssetCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

