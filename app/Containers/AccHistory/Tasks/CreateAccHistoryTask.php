<?php

namespace App\Containers\AccHistory\Tasks;

use App\Containers\AccHistory\Data\Repositories\AccHistoryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccHistoryTask extends Task
{

    protected $repository;

    public function __construct(AccHistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

