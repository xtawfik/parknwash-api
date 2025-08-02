<?php

namespace App\Containers\CarCountry\Tasks;

use App\Containers\CarCountry\Data\Repositories\CarModelRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCarCountryTask extends Task
{

    protected $repository;

    public function __construct(CarModelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);



        return $repository;
    }
}

