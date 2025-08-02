<?php

namespace App\Containers\FixedAssets\Tasks;

use App\Containers\FixedAssets\Data\Repositories\FixedAssetsRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateFixedAssetsTask extends Task
{

    protected $repository;

    public function __construct(FixedAssetsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

