<?php

namespace App\Containers\AccDivision\Tasks;

use App\Containers\AccDivision\Data\Repositories\AccDivisionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccDivisionsTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
