<?php

namespace App\Containers\AccControlType\Tasks;

use App\Containers\AccControlType\Data\Repositories\AccControlTypeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccControlTypeTask extends Task
{

    protected $repository;

    public function __construct(AccControlTypeRepository $repository)
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

