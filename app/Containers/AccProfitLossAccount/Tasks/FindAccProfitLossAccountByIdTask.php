<?php

namespace App\Containers\AccProfitLossAccount\Tasks;

use App\Containers\AccProfitLossAccount\Data\Repositories\AccProfitLossAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccProfitLossAccountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccProfitLossAccountRepository $repository)
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
