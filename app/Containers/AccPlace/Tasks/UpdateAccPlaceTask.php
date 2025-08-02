<?php

namespace App\Containers\AccPlace\Tasks;

use App\Containers\AccPlace\Data\Repositories\AccPlaceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccPlaceTask extends Task
{

    protected $repository;

    public function __construct(AccPlaceRepository $repository)
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

