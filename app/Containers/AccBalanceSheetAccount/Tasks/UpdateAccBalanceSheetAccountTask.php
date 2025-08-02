<?php

namespace App\Containers\AccBalanceSheetAccount\Tasks;

use App\Containers\AccBalanceSheetAccount\Data\Repositories\AccBalanceSheetAccountRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccBalanceSheetAccountTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

