<?php

namespace App\Containers\AccFixedAsset\Tasks;

use App\Containers\AccFixedAsset\Data\Repositories\AccFixedAssetRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccFixedAssetTask extends Task
{

    protected $repository;

    public function __construct(AccFixedAssetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        if(request()->has("entries")) {
              $repository->entries()->sync(request("entries"));
            }


        return $repository;
    }
}

