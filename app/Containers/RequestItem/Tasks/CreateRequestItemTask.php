<?php

namespace App\Containers\RequestItem\Tasks;

use App\Containers\RequestItem\Data\Repositories\RequestItemRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateRequestItemTask extends Task
{

    protected $repository;

    public function __construct(RequestItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

