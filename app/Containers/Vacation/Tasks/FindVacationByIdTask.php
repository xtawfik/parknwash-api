<?php

namespace App\Containers\Vacation\Tasks;

use App\Containers\Vacation\Data\Repositories\VacationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindVacationByIdTask extends Task
{

    protected $repository;

    public function __construct(VacationRepository $repository)
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
