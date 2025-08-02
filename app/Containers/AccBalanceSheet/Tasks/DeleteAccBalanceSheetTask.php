<?php

namespace App\Containers\AccBalanceSheet\Tasks;

use App\Containers\AccBalanceSheet\Data\Repositories\AccBalanceSheetRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAccBalanceSheetTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetRepository $repository)
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
