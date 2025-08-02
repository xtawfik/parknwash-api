<?php

namespace App\Containers\AccBalanceSheetAccount\Tasks;

use App\Containers\AccBalanceSheetAccount\Data\Repositories\AccBalanceSheetAccountRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccBalanceSheetAccountTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetAccountRepository $repository)
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
