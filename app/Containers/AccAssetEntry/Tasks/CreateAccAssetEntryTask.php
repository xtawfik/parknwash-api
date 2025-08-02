<?php

namespace App\Containers\AccAssetEntry\Tasks;

use App\Containers\AccAssetEntry\Data\Repositories\AccAssetEntryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccAssetEntryTask extends Task
{

    protected $repository;

    public function __construct(AccAssetEntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

