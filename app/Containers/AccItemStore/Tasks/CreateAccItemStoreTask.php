<?php

namespace App\Containers\AccItemStore\Tasks;

use App\Containers\AccItemStore\Data\Repositories\AccItemStoreRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccItemStoreTask extends Task
{

    protected $repository;

    public function __construct(AccItemStoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

