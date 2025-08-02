<?php

namespace App\Containers\AccDivisionPlace\Tasks;

use App\Containers\AccDivisionPlace\Data\Repositories\AccDivisionPlaceRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccDivisionPlaceTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionPlaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

