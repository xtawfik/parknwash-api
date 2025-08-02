<?php

namespace App\Containers\AccFixedAsset\Tasks;

use App\Containers\AccFixedAsset\Data\Repositories\AccFixedAssetRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccFixedAssetTask extends Task
{

    protected $repository;

    public function __construct(AccFixedAssetRepository $repository)
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
