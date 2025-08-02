<?php

namespace App\Containers\City\Tasks;

use App\Containers\City\Data\Repositories\CityRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCityByIdTask extends Task
{

    protected $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
