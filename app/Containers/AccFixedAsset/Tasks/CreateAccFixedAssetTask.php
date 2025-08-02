<?php

namespace App\Containers\AccFixedAsset\Tasks;

use App\Containers\AccFixedAsset\Data\Repositories\AccFixedAssetRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccFixedAssetTask extends Task
{

    protected $repository;

    public function __construct(AccFixedAssetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        if(request()->has("entries")) {
              $repository->entries()->sync(request("entries"));
            }


        return $repository;
    }
}

