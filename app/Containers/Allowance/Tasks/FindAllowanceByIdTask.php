<?php

namespace App\Containers\Allowance\Tasks;

use App\Containers\Allowance\Data\Repositories\AllowanceRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAllowanceByIdTask extends Task
{

    protected $repository;

    public function __construct(AllowanceRepository $repository)
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
