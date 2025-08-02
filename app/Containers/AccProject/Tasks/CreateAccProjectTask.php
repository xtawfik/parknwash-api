<?php

namespace App\Containers\AccProject\Tasks;

use App\Containers\AccProject\Data\Repositories\AccProjectRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccProjectTask extends Task
{

    protected $repository;

    public function __construct(AccProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

