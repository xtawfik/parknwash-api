<?php

namespace App\Containers\AccDivision\Tasks;

use App\Containers\AccDivision\Data\Repositories\AccDivisionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccDivisionTask extends Task
{

    protected $repository;

    public function __construct(AccDivisionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        if(request()->has("places")) {
              $repository->places()->sync(request("places"));
            }


        return $repository;
    }
}

