<?php

namespace App\Containers\AccPlace\Tasks;

use App\Containers\AccPlace\Data\Repositories\AccPlaceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccPlaceTask extends Task
{

    protected $repository;

    public function __construct(AccPlaceRepository $repository)
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

