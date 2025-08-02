<?php

namespace App\Containers\AccFixedAsset\Tasks;

use App\Containers\AccFixedAsset\Data\Repositories\AccFixedAssetRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccFixedAssetByIdTask extends Task
{

    protected $repository;

    public function __construct(AccFixedAssetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
