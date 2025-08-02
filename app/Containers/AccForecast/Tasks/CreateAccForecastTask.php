<?php

namespace App\Containers\AccForecast\Tasks;

use App\Containers\AccForecast\Data\Repositories\AccForecastRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAccForecastTask extends Task
{

    protected $repository;

    public function __construct(AccForecastRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

