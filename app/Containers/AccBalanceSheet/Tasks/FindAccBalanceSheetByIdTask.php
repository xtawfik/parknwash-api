<?php

namespace App\Containers\AccBalanceSheet\Tasks;

use App\Containers\AccBalanceSheet\Data\Repositories\AccBalanceSheetRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccBalanceSheetByIdTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetRepository $repository)
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
