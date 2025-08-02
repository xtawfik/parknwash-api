<?php

namespace App\Containers\AccForecast\Tasks;

use App\Containers\AccForecast\Data\Repositories\AccForecastRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccForecastTask extends Task
{

    protected $repository;

    public function __construct(AccForecastRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

