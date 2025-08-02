<?php

namespace App\Containers\VacationType\Tasks;

use App\Containers\VacationType\Data\Repositories\VacationTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateVacationTypeTask extends Task
{

    protected $repository;

    public function __construct(VacationTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

