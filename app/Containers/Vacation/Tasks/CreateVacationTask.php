<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateVacationTask extends Task
{

    protected $repository;

    public function __construct(VacationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

