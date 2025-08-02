<?php

namespace App\Containers\DeductionType\Tasks;

use App\Containers\DeductionType\Data\Repositories\DeductionTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDeductionTypeTask extends Task
{

    protected $repository;

    public function __construct(DeductionTypeRepository $repository)
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

