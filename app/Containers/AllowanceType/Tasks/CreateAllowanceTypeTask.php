<?php

namespace App\Containers\AllowanceType\Tasks;

use App\Containers\AllowanceType\Data\Repositories\AllowanceTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAllowanceTypeTask extends Task
{

    protected $repository;

    public function __construct(AllowanceTypeRepository $repository)
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

