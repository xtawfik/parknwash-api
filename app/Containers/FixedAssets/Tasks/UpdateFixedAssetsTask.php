<?php

namespace App\Containers\FixedAssets\Tasks;

use App\Containers\FixedAssets\Data\Repositories\FixedAssetsRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateFixedAssetsTask extends Task
{

    protected $repository;

    public function __construct(FixedAssetsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

