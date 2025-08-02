<?php

namespace App\Containers\VacationType\Tasks;

use App\Containers\VacationType\Data\Repositories\VacationTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindVacationTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(VacationTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
