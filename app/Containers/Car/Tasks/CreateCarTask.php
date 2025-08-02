<?php

namespace App\Containers\Car\Tasks;

use App\Containers\Car\Data\Repositories\CarRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCarTask extends Task
{

    protected $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        if(request()->has("countries")) {
              $repository->countries()->sync(request("countries"));
            }


        return $repository;
    }
}

