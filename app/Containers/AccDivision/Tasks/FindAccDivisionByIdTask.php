<?php

namespace App\Containers\AccDivision\Tasks;

use App\Containers\AccDivision\Data\Repositories\AccDivisionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccDivisionByIdTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionRepository $repository)
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
