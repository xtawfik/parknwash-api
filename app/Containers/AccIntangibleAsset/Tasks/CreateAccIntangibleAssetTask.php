<?php

namespace App\Containers\AccIntangibleAsset\Tasks;

use App\Containers\AccIntangibleAsset\Data\Repositories\AccIntangibleAssetRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccIntangibleAssetTask extends Task
{

    protected $repository;

    public function __construct(AccIntangibleAssetRepository $repository)
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

