<?php

namespace App\Containers\AccProfitLoss\Tasks;

use App\Containers\AccProfitLoss\Data\Repositories\AccProfitLossRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccProfitLossTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossRepository $repository)
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
