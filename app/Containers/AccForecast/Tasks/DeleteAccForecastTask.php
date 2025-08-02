<?php

namespace App\Containers\AccForecast\Tasks;

use App\Containers\AccForecast\Data\Repositories\AccForecastRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccForecastTask extends Task
{

    protected $repository;

    public function __construct(AccForecastRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
