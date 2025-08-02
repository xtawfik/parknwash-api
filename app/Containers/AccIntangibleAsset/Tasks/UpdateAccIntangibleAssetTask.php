<?php

namespace App\Containers\AccIntangibleAsset\Tasks;

use App\Containers\AccIntangibleAsset\Data\Repositories\AccIntangibleAssetRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccIntangibleAssetTask extends Task
{

    protected $repository;

    public function __construct(AccIntangibleAssetRepository $repository)
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

