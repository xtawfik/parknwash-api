<?php

namespace App\Containers\DeductionType\Tasks;

use App\Containers\DeductionType\Data\Repositories\DeductionTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindDeductionTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(DeductionTypeRepository $repository)
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
