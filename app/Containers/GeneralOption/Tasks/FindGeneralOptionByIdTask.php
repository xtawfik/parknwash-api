<?php

namespace App\Containers\GeneralOption\Tasks;

use App\Containers\GeneralOption\Data\Repositories\GeneralOptionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindGeneralOptionByIdTask extends Task
{

    protected $repository;

    public function __construct(GeneralOptionRepository $repository)
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
