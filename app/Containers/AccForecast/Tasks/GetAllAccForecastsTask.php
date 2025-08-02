<?php

namespace App\Containers\AccForecast\Tasks;

use App\Containers\AccForecast\Data\Repositories\AccForecastRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAccForecastsTask extends Task
{

    protected $repository;

    public function __construct(AccForecastRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
