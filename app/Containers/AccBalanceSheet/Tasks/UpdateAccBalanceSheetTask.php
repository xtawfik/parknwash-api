<?php

namespace App\Containers\AccBalanceSheet\Tasks;

use App\Containers\AccBalanceSheet\Data\Repositories\AccBalanceSheetRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAccBalanceSheetTask extends Task
{

    protected $repository;

    public function __construct(AccBalanceSheetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

