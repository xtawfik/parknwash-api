<?php

namespace App\Containers\AssetCategory\Tasks;

use App\Containers\AssetCategory\Data\Repositories\AssetCategoryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAssetCategoryTask extends Task
{

    protected $repository;

    public function __construct(AssetCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
