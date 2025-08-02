<?php

namespace App\Containers\AccDivisionPlace\Tasks;

use App\Containers\AccDivisionPlace\Data\Repositories\AccDivisionPlaceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccDivisionPlaceTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

