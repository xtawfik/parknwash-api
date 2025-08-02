<?php

namespace App\Containers\CarCountry\Tasks;

use App\Containers\CarCountry\Data\Repositories\CarModelRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCarCountryTask extends Task
{

    protected $repository;

    public function __construct(CarModelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);



        return $repository;
    }
}

