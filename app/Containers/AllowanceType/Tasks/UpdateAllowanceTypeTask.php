<?php

namespace App\Containers\AllowanceType\Tasks;

use App\Containers\AllowanceType\Data\Repositories\AllowanceTypeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAllowanceTypeTask extends Task
{

    protected $repository;

    public function __construct(AllowanceTypeRepository $repository)
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

