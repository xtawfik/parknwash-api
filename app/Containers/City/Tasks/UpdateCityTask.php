<?php

namespace App\Containers\City\Tasks;

use App\Containers\City\Data\Repositories\CityRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateCityTask extends Task
{

    protected $repository;

    public function __construct(CityRepository $repository)
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

