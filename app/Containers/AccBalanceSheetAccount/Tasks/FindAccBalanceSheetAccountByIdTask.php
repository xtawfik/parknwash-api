<?php

namespace App\Containers\AccBalanceSheetAccount\Tasks;

use App\Containers\AccBalanceSheetAccount\Data\Repositories\AccBalanceSheetAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAccBalanceSheetAccountByIdTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetAccountRepository $repository)
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
