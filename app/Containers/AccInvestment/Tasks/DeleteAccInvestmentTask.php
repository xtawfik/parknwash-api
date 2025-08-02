<?php

namespace App\Containers\AccInvestment\Tasks;

use App\Containers\AccInvestment\Data\Repositories\AccInvestmentRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccInvestmentTask extends Task
{

    protected $repository;

    public function __construct(AccInvestmentRepository $repository)
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
