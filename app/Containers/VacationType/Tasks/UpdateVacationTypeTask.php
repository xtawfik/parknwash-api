<?php

namespace App\Containers\VacationType\Tasks;

use App\Containers\VacationType\Data\Repositories\VacationTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateVacationTypeTask extends Task
{

    protected $repository;

    public function __construct(VacationTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

