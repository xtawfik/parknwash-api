<?php

namespace App\Containers\Car\Tasks;

use App\Containers\Car\Data\Repositories\CarRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCarTask extends Task
{

    protected $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        if(request()->has("countries")) {
              $repository->countries()->sync(request("countries"));
            }


        return $repository;
    }
}

