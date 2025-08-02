<?php

namespace App\Containers\AssetCategory\Tasks;

use App\Containers\AssetCategory\Data\Repositories\AssetCategoryRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAssetCategoryTask extends Task
{

    protected $repository;

    public function __construct(AssetCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

