<?php

namespace App\Containers\DeductionType\Tasks;

use App\Containers\DeductionType\Data\Repositories\DeductionTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDeductionTypeTask extends Task
{

    protected $repository;

    public function __construct(DeductionTypeRepository $repository)
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

