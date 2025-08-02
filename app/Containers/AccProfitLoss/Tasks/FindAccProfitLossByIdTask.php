<?php

namespace App\Containers\AccProfitLoss\Tasks;

use App\Containers\AccProfitLoss\Data\Repositories\AccProfitLossRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccProfitLossByIdTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossRepository $repository)
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
