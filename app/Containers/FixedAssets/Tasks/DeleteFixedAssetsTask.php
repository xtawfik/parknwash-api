<?php

namespace App\Containers\FixedAssets\Tasks;

use App\Containers\FixedAssets\Data\Repositories\FixedAssetsRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteFixedAssetsTask extends Task
{

    protected $repository;

    public function __construct(FixedAssetsRepository $repository)
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
